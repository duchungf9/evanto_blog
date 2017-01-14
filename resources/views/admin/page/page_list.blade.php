@extends('layouts.app')

@section('content')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-app="myApp" ng-controller="pageController">
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
		<button class="btn btn-group-lg btn-success" onclick="javascript:window.location = '/admin/page/create'"><i class="fa fa-plus-circle"></i> Create New Page</button>
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
					<td>@{{ post.content }}</td>
					<td>
						<button class="btn  btn-primary" ng-click="editPage(post)"><i class="fa fa-pencil-square-o"></i>Edit</button>
						<button class="btn  btn-alert" ng-click="delPage(post,key)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
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
		app.controller('pageController',function($scope,$http){
			var token = '{!! csrf_token() !!}';
			$scope.list = "";
			$scope.list = [
					@foreach($list as $row)
						JSON.parse('{!! json_encode($row) !!}'),
					@endforeach
			];
			$scope.editPage = function(page){
				window.location = '{{URL::to('/')}}'+"/admin/page/create/"+page.id;
			}
			$scope.delPage = function(page,key){
				var question = prompt("Do you really want to delete this page?.  Type 'Yes' to confirm.", "Yes");

				if (question == 'Yes') {
					$http.post(
							'/admin/page/delete',
							$.param({_token: token, page: page}),
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
		});

	</script>
@endsection

