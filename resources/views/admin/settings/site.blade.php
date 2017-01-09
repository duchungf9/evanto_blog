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
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<form action='/admin/settings/site' method="POST" enctype="multipart/form-data">
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
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<pre id="output">
				<?php
					$config = \App\Http\Model\SConfigs::where('state', '=', 1)->get();
					if(isset($config) && count($config) > 0){
						foreach($config as $cfg){
							\Config::set($cfg->key, $cfg->value);
						}
					}
				?>
				{!! dump(\App\Http\Lib\Common::metaGet())!!}
			</pre>
		</div>

		</div>
@endsection
@section('footer_script')
	<script src="{{URL::to('/')}}/js/angular.min.js"></script>
	<script>
		var app = angular.module('myApp',[]);
		app.controller('siteController',function($scope,$http){
			$scope.site = "";
			$scope.configs = [
				@foreach($configs as $row)
					{!! $row !!},
				@endforeach
			];
		});

	</script>
@endsection

