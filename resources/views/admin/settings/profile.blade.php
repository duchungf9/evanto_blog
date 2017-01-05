@extends('layouts.app')
@section('head_style')
    <link rel="stylesheet" href="{{URL::to('/')}}/css/gallery.css">
@endsection
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-app="myApp" ng-controller="profileController">
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


    </div>
@endsection
@section('footer_script')
    <script src="{{URL::to('/')}}/js/angular.min.js"></script>
    <script>
        var app = angular.module('myApp',[]);
        app.controller('profileController',function($scope,$http){
            $scope.list = [
                @foreach($list as $row)
                {!!  $row !!},
                @endforeach
            ];
            $scope.slider = [
                @foreach($slider as $row)
                {!!  $row !!},
                @endforeach
            ];
            $scope.setslider = function(slider,key){
                $http.post(
                        window.location.href,
                        $.param({_token: token,setslider:1,pid:slider.id}),
                        {headers : {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}}
                ).then(
                        function(response){
                            if(response.data=='ok_add'){
                                $scope.list.splice(key,1);
                                $scope.slider.push(slider);
                            }
                            if(response.data=='ok_remove'){
                                $scope.slider.splice(key,1);
                                $scope.list.push(slider);
                            }
                        },function(response){
                        }
                );
            }
            var token = '{{csrf_token()}}';
        });
    </script>
@endsection
