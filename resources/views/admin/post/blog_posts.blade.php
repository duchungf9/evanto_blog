@extends('layouts.app')
@section('head_style')
	<link rel="stylesheet" href="{{URL::to('/')}}/css/jquery-te-1.4.0.css">
@endsection
@section('content')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-app="myApp" ng-controller="postController">
		<h5>Creat new Post.</h5>
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
		<form action='@{{ action }}' method="POST" enctype="multipart/form-data">
			<div class="input-group">
				<span class="input-group-addon">Category ID</span>
				<select name="category_id" id="category_id" class="selectbox" ng-model="post.category_id">
					<option value="null">--chose category--</option>
					<option value="@{{ cat.id }}" ng-repeat="(key,cat) in category_ids" ng-selected="post.category_id">@{{ cat.name }}</option>
				</select>
			</div>
				<br>
			<div class="input-group">
				<span class="input-group-addon">Title</span>
				<input type="text" class="form-control" name="title" ng-model="post.title"/>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon">Slug</span>
				<input type="text" class="form-control" name="slug" ng-model="post.slug"/>
			</div>
				<br>
			<div class="input-group">
				<span class="input-group-addon">Image</span>
				<input type="file" class="form-control" name="image"/>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon">Description</span>
				<input type="text" class="form-control" name="description" ng-model="post.description"/>
			</div>
				<br>
			<div class="input-group">
				<span class="input-group-addon">Summary</span>
				<input type="text" class="form-control" name="summary" ng-model="post.summary"/>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon">Content</span>
				<textarea  name="content" ng-model="post.content"></textarea>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon">Status (hide or show)</span>
				<select name="status" id="status" class="selectbox">
					<option value="">--chose status--</option>
					<option value="0" <?php echo (isset($post)and $post->status==0)?'selected':""; ?>>hide</option>
					<option value="1" <?php echo (isset($post)and $post->status==1)?'selected':""; ?>>show</option>
				</select>
			</div>
			<br>
			<div class="input-group">
				<span class="input-group-addon">Featured</span>
				<select name="featured" id="featured" class="selectbox">
					<option value="">--chose status--</option>
					<option value="0" <?php echo (isset($post)and $post->featured==0)?'selected':""; ?>>No</option>
					<option value="1" <?php echo (isset($post)and $post->featured==1)?'selected':""; ?>>Yes</option>
				</select>
			</div>
			<br>
			{{ csrf_field() }}
			@if(isset($post))
				{{ method_field('PUT') }}
			@endif
			<br>
			<br>

			<button class="btn btn-info">Submit</button>
		</form>
	</div>
@endsection
@section('footer_script')
	<script src="{{URL::to('/')}}/js/jquery-te-1.4.0.min.js"></script>
	<script src="{{URL::to('/')}}/js/angular.min.js"></script>
	<script>
		var app = angular.module('myApp',[]);
		app.controller('postController',function($scope,$http){
			$("textarea").jqte();
			$scope.category_ids = [];
			var token = '{!! csrf_token() !!}';
			$scope.action = "/admin/post";
			$scope.post = "";
			$scope.post.category_id = 'null';
			@if(isset($post))
					$scope.method = "PUT";
					$scope.post = {!! $post !!};
					$scope.action = "/admin/post/"+$scope.post.id;
					$("textarea").jqteVal($scope.post.content);
			@endif
			@if(Session::has('oldInput'))
					<?php
						$oldInput = Session::get('oldInput');
					?>
					$scope.post = '{!! json_encode($oldInput) !!}';
					$scope.post =(JSON.parse($scope.post));
			@endif
			$http.post(
					'/admin/post/get_cat_ids',
					$.param({_token: token}),
					{headers : {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}}
			).then(
					function(response){
						if(typeof response.data=='object'){
							$scope.category_ids = response.data;
						}
					},function(response){
					}
			);
		});

	</script>
@endsection

