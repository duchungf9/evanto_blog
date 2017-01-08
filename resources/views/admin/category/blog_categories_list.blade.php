@extends('layouts.app')

@section('content')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-app="myApp" ng-controller="categoryController">
		<h5>List Category</h5>
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
		<button class="btn btn-group-lg btn-success" onclick="javascript:window.location = '/admin/category'">Create New Category</button>
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
				<tr ng-repeat="(key,category) in list">
					<td>@{{ category.id }}</td>
					<td>@{{ category.name }}</td>
					<td>@{{ category.slug }}</td>
					<td>
						<button class="btn btn-block" ng-click="editCat(category)">Edit</button>
						<button class="btn btn-block" ng-click="delCat(category,key)">Delete</button>
					</td>
				</tr>
			</tbody>
		</table>
		{{$list->links()}}
	</div>
@endsection
@section('footer_script')
	<script src="{{URL::to('/')}}/js/angular.min.js"></script>
	<script>
		var app = angular.module('myApp',[]);
		app.controller('categoryController',function($scope,$http){
			$scope.list = [
					@foreach($list as $row)
						{!!  $row !!},
					@endforeach
			];
			$scope.editCat = function(cat){
				window.location = '{{URL::to('/')}}/admin/category/'+cat.id;
			}
			var token = '{!! csrf_token() !!}';
			$scope.delCat = function(cat,key) {
				var question = prompt("Do you really want to delete this category?. All post what related with it will be move to UnCategory Category. Type 'Yes' to confirm.", "Yes");

				if (question == 'Yes') {
					$http.post(
						'/admin/category/delete',
						$.param({_token: token, cat: cat}),
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

