@extends('layouts.app')

@section('content')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-app="myApp" ng-controller="siteController">
		<h5>Site Settings</h5>
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
		<form action='/admin/settings/site' method="POST" enctype="multipart/form-data">
			<div class="input-group">
				<span class="input-group-addon">Site's Name</span>
				<input type="text" class="form-control" name="title" ng-model="site.title"/>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon">Logo</span>
				<img src="/logo.png" alt="" style="max-width: 100%;">
				<input type="file" class="form-control" name="logo" ng-model="site.logo"/>
			</div>
			<br>
			<div ng-repeat="(key,config) in configs">
				<div class="input-group">
					<span class="input-group-addon">@{{config.key}}</span>
					<input type="text" class="form-control" name="@{{config.key}}" ng-model="config.value"/>
				</div>
				<br>
			</div>

			{{ csrf_field() }}
			<button class="btn btn-info">Submit</button>
		</form>
	</div>
@endsection
@section('footer_script')
	<script src="{{URL::to('/')}}/js/angular.min.js"></script>
	<script>
		var app = angular.module('myApp',[]);
		app.controller('siteController',function($scope,$http){
			$scope.site = "";
			@if(isset($site))
					$scope.site = '{!! json_encode($site) !!}';
					$scope.site = (JSON.parse($scope.site));
			@endif
			$scope.configs = [
				@foreach($configs as $row)
					{!! $row !!},
				@endforeach
			];
		});

	</script>
@endsection

