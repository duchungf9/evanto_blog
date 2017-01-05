@extends('layouts.app')
@section('head_style')
    <link rel="stylesheet" href="{{URL::to('/')}}/css/gallery.css">
@endsection
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-app="myApp" ng-controller="mediaController">
        <h5>Media Manager</h5>
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
        <div id="boximage" class="boximage">
            <a title="@{{ img }}" href="javascript:void(0);" ng-repeat="(key,img) in list">
                <img alt="@{{ img }}" src="@{{ img }}"/>
                <div class="task__actions">
                    <i class="fa fa-times" ng-click="delete(key,img)"> Delete This</i>
                </div>
            </a>
            <div class="clear"></div>
        </div>

    </div>
@endsection
@section('footer_script')
    <script src="{{URL::to('/')}}/js/angular.min.js"></script>
    <script>
        var app = angular.module('myApp',[]);
        app.controller('mediaController',function($scope,$http){
            $scope.list = [
                @foreach($list as $row)
                '{{  $row }}',
                @endforeach
            ];
            var token = '{{csrf_token()}}';
            $scope.delete = function(key,image){
                $http.post(
                    '/admin/media/deleteimage',
                    $.param({_token: token,image:image}),
                    {headers : {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}}
                ).then(
                    function(response){
                        if(response.data=='ok'){
                            $scope.list.splice(key,1);
                        }
                    },function(response){
                    }
                );


            }
        });
    </script>
@endsection
