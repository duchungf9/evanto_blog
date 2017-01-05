@extends('layouts.app')
@section('head_style')
    <link rel="stylesheet" href="{{URL::to('/')}}/css/gallery.css">
@endsection
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-app="myApp" ng-controller="profileController">
        <h5>Edit Profile</h5>
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
        <form action='/admin/settings/profile' method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <span class="input-group-addon">Avatar</span>
                <img src="@{{ user.avatar }}" ng-model="user.avatar"/>
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon">display name</span>
                <input type="text" class="form-control" name="name" ng-model="user.name"/>
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon">email</span>
                <input type="text" class="form-control" name="email" ng-model="user.email"/>
            </div>
            <br>
            <div class="input-group">
                <span class="input-group-addon">Avatar</span>
                <input type="file" class="form-control" name="avatar"/>
            </div>
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
    <script src="{{URL::to('/')}}/js/angular.min.js"></script>
    <script>
        var app = angular.module('myApp',[]);
        app.controller('profileController',function($scope,$http){
            $scope.user = {!! $user !!};


            var token = '{{csrf_token()}}';
        });
    </script>
@endsection
