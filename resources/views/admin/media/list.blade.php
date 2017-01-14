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
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>#id</th>
                    <th>image</th>
                    <th>url</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr ng-repeat="(key,img) in list | filter:postFilter">
                    <td>@{{ key }}</td>
                    <td><img alt="@{{ img }}" src="@{{ img }}" style="max-width: 20%;"/></td>
                    <td>@{{ img }}</td>
                    <td>
                            <button class="btn  btn-alert" ng-click="delete(key,img)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </td>
                </tr>
                </tbody>
            </table>
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
