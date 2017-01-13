@extends('layouts.app')

@section('content')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-app="myApp" ng-controller="postController">
		<h5>List Posts</h5>
		@if(isset($mes))
			<div class="alert alert-success">
				<strong>Error!</strong> You have fix these error(s):</a>.
				<ul>
					@foreach($mes as $row)
						<li>{{$row}}</li>
					@endforeach
				</ul>
			</div>
		@endif
		@if(Session::has('flash_mes'))
			<div class="alert alert-success">
				@if(Session::has('flash_ok'))
					<strong>Congrat!</strong> You done it!</a>.
				@else
					<strong>Error!</strong> You have fix these error(s):</a>.
				@endif

				<ul>
					@foreach(Session::get('flash_mes') as $row)
						<li>{{$row}}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<button class="btn btn-group-lg btn-success" onclick="javascript:window.location = '/admin/post'"><i class="fa fa-plus-circle"></i> Create New Post</button>
		<input type="text" ng-model="postFilter" ng-change="searchPost()" placeholder=" search posts here...">
		<p></p>
		<table class="table table-striped table-bordered table-hover">
			<thead>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Slug</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr ng-repeat="(key,post) in list | filter:postFilter">
					<td>@{{ post.id }}</td>
					<td>@{{ post.title }}</td>
					<td>@{{ post.slug }}</td>
					<td>
						<button class="btn  btn-primary" ng-click="editCat(post)"><i class="fa fa-pencil-square-o"></i>  Edit</button>
						<button class="btn  btn-alert" ng-click="delCat(post,key)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
						<button class="btn  btn-success" ng-click="publish(post,key,'publish')" ng-show="post.status=='draft'"><i class="fa fa-volume-up"></i>  Publish</button>
						<button class="btn  btn-success" ng-click="publish(post,key,'draft')" ng-show="post.status=='publish'"><i class="fa fa-volume-up"></i> Un Publish</button>
						<button class="btn  btn-warning" ng-click="featured(post,key,'1')" ng-show="post.featured!='1'"><i class="fa fa-heart"></i> set as feature</button>
						<button class="btn  btn-warning" ng-click="featured(post,key,'0')" ng-show="post.featured=='1'"><i class="fa fa-heart"></i> Un set as feature</button>
					</td>
				</tr>
			</tbody>
		</table>
		{{ $list->links() }}

	</div>
@endsection
@section('footer_script')
	<script src="{{URL::to('/')}}/js/angular.min.js"></script>
	<script>
		var app = angular.module('myApp',[]);
		app.controller('postController',function($scope,$http){
			$scope.list = [
					@foreach($list as $row)
						{!!  $row !!},
					@endforeach
			];
			$scope.editCat = function(post){
				window.location = '{{URL::to('/')}}/admin/post/'+post.id;
			}
			var token = '{!! csrf_token() !!}';
			$scope.delCat = function(post,key) {
				var question = prompt("Do you really want to delete this post?. Type 'Yes' to confirm.", "Yes");

				if (question == 'Yes') {
					$http.post(
						'/admin/post/delete',
						$.param({_token: token, post: post}),
						{headers : {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}}
					).then(
						function(response){
							if(response.data=='ok'){
								$scope.list.splice(key, 1);
							}
						},function(response){
						}
					);

				}
			}
			$scope.httpStatus = 0;
			$scope.searchPost = function(){
                if($scope.httpStatus==1){
                    return false;
				}
                $scope.httpStatus = 1;
                var searchString  = $scope.postFilter;
                if(searchString.length>=1){
                    $http.post(
                        '/admin/post/searchfilter',
                        $.param({_token: token, string: searchString}),
                        {headers : {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}}
                    ).then(
                        function(response){
                            if(typeof response.data!='undefined'){
                                $scope.httpStatus = 0;
                                $scope.list = response.data;
                            }

                        },function(response){
                            $scope.httpStatus = 0;
                        }
                    );
				}
            }
			$scope.publish = function(post,key,status){
				$http.post(
						'/admin/post/publish',
						$.param({_token: token, status: status,pid:post.id}),//1: publish, 0: draft
						{headers : {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}}
				).then(
						function(response){
							if(response.data=='ok'){
								post.status = status;
							}

						},function(response){
							$scope.httpStatus = 0;
						}
				);
			}
			$scope.featured = function(post,key,status){
				$http.post(
						'/admin/post/setfeatured',
						$.param({_token: token, status: status,pid:post.id}),//1: publish, 0: draft
						{headers : {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}}
				).then(
						function(response){
							if(response.data=='ok'){
								post.featured = status;
							}

						},function(response){
							$scope.httpStatus = 0;
						}
				);
			}
		});

	</script>
@endsection

