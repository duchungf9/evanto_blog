@extends('layouts.app')
@section('head_style')

@endsection
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-app="myApp" ng-controller="menuController">
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
        <label for="">Home Page Menu</label>
        <p></p>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <label for="">Double Click to add to Menu</label>
            <p></p>
            <select name="" id="" multiple style="min-height: 500px; width: 100%;">
                <option ng-repeat="(key,cat) in list" ng-dblClick="addTomenu(key,cat)">@{{ cat.name }}</option>
            </select>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <label for="">Double Click to remove from Menu</label>
            <p></p>
            <select name="" id="" multiple style="min-height: 500px; width: 100%;">
                <option ng-repeat="(key,cat) in menu" ng-dblClick="removeTomenu(key,cat)">@{{ cat.name }}</option>
            </select>
        </div>
        <button class="btn btn-success btn-block" ng-click="savemenu()">Save</button>
    </div>
@endsection
@section('footer_script')
    <script src="{{URL::to('/')}}/js/angular.min.js"></script>
    <script>
        var app = angular.module('myApp',[]);
        app.controller('menuController',function($scope,$http){
            $scope.list = "";
            $scope.list = [
                    @foreach($categories as $cat)
                         {!! $cat !!},
                    @endforeach
            ];
            $scope.menu = "";
            $scope.menu = [
                @foreach($menu as $cat)
                   {!! $cat !!},
                @endforeach
            ];
            console.log($scope.menu);
            $scope.addTomenu = function(key,cat){
                $scope.list.splice(key,1);
                $scope.menu.push(cat);
            }

            $scope.removeTomenu = function(key,cat){
                $scope.menu.splice(key,1);
                $scope.list.push(cat);
            }
            $scope.savemenu = function(){
                $http.post(
                        window.location.href,
                        $.param({_token: token,menu:$scope.menu}),
                        {headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}}
                ).then(
                        function (response) {
                            if (typeof response.data == 'object') {
                                $scope.category_ids = response.data;
                            }
                        }, function (response) {
                        }
                );
            }
            var token = '{{csrf_token()}}';
        });
    </script>

@endsection
