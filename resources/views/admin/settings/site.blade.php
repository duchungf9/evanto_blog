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
		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
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
		<label for="">Preview SEO META</label>

		<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

			<div id="output">
				<div class="container">
					<!-- end of search bar -->
					<!-- end of link nav bar-->

					<div id="search">
						<p style="color:grey">About 25,600,000 results (0.62 seconds) </p>

						<div id="result">
							<h4><a href="#"> {{\Config::get('app.seo.title')}}</a>...</h4>
							<p id="link">{{$_ENV['DOMAIN_CURRENT']}}<span class="glyphicon glyphicon-triangle-bottom" id="gsize"></span></p>
							<p id="summary"><span id="date">Jan 1, 2017 - </span><b>{{\Config::get('app.seo.title')}}</b> {{\Config::get('app.seo.description')}} .</p>
						</div>

						<hr>
						<div id="images">
							<h4><a href="#">{{\Config::get('app.seo.title')}}|{{\Config::get('app.seo.description')}}</a></h4>
							<span id="date"><a href="#"> Report images</a></span>
							<p>
							<p>
								<a href="#"><img src="{{\Config::get('app.seo.gg_image','http://placeholdit.com/200x200')}}"></a>
							</p>
						</div>
						<br>
						<div id="others">
							<h4 style="font-size:14px"><a href="#">More images for {{\Config::get('app.seo.title')}}</a></h4>
							<hr>
							<p style=" font-size:16px;"> Searches related to {{\Config::get('app.seo.title')}}</p>
						</div>
						<div class="other">
							<a href="#">{{\Config::get('app.seo.title')}} 1</a>
							<a href="#">{{\Config::get('app.seo.title')}} 2</a>
							<p><a href="#"{{\Config::get('app.seo.title')}} 3</a>
								<a href="#">{{\Config::get('app.seo.title')}}</a>
							<p><a href="#">{{\Config::get('app.seo.title')}}</a>
								<a href="#">{{\Config::get('app.seo.title')}}</a>
						</div>
						<hr>
						<div class="container2">
							<a href="#"><img src="https://www.google.com/images/nav_logo242.png" style="overflow: hidden; position:absolute; margin-left:15px; clip: rect(0px,75px,30px,10px)"></a>
							<img src="https://www.google.com/images/nav_logo242.png" style="overflow: hidden; position:absolute; margin-left: 15px; clip: rect(0px,95px,30px,75px)">
							<img src="https://www.google.com/images/nav_logo242.png" style="overflow: hidden; position:absolute; margin-left: 35px; clip: rect(0px,95px,30px,75px)">
							<img src="https://www.google.com/images/nav_logo242.png" style="overflow: hidden; position:absolute; margin-left: 55px; clip: rect(0px,95px,30px,75px)">
							<img src="https://www.google.com/images/nav_logo242.png" style="overflow: hidden; position:absolute; margin-left: 75px; clip: rect(0px,95px,30px,75px)">
							<img src="https://www.google.com/images/nav_logo242.png" style="overflow: hidden; position:absolute; margin-left: 95px; clip: rect(0px,95px,30px,75px)">
							<img src="https://www.google.com/images/nav_logo242.png" style="overflow: hidden; position:absolute; margin-left: 115px; clip: rect(0px,95px,30px,75px)">
							<img src="https://www.google.com/images/nav_logo242.png" style="overflow: hidden; position:absolute; margin-left: 135px; clip: rect(0px,95px,30px,75px)">
							<img src="https://www.google.com/images/nav_logo242.png" style="overflow: hidden; position:absolute; margin-left: 155px; clip: rect(0px,95px,30px,75px)">
							<img src="https://www.google.com/images/nav_logo242.png" style="overflow: hidden; position:absolute; margin-left: 175px; clip: rect(0px,95px,30px,75px)">
							<img src="https://www.google.com/images/nav_logo242.png" style="overflow: hidden; position:absolute; margin-left: 175px; clip: rect(0px,180px,40px,95px)">
						</div>
			</div>
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

