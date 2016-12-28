@extends('layouts.app')

@section('content')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-app="myApp" ng-controller="categoryController">
		<h5>Creat Category</h5>
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
		<form action='@{{ action }}' method="POST">
			<div class="input-group">
				<span class="input-group-addon">Name</span>
				<input type="text" class="form-control" name="name" ng-model="category.name"/>
			</div>
				<br>
			<div class="input-group">
				<span class="input-group-addon">Slug</span>
				<input type="text" class="form-control" name="slug" ng-model="category.slug"/>
			</div>
				<br>
			<div class="input-group">
				<span class="input-group-addon">Description</span>
				<input type="text" class="form-control" name="description" ng-model="category.description"/>
			</div>
				<br>
			{{ csrf_field() }}
			@if(isset($category))
				{{ method_field('PUT') }}
			@endif
			<button class="btn btn-info">Submit</button>
		</form>
	</div>
@endsection
@section('footer_script')
	<script src="{{URL::to('/')}}/js/angular.min.js"></script>
	<script>
		var app = angular.module('myApp',[]);
		app.controller('categoryController',function($scope,$http){
			$scope.category = "";
			$scope.method = "";
			$scope.action = "/admin/category";
			@if(isset($category))
				$scope.method = "PUT";
				$scope.category = {!! $category !!};
				$scope.action = "/admin/category/"+$scope.category.id;
			@endif
			console.log($scope.category);
		});

	</script>
@endsection

