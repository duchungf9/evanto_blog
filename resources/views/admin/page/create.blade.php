@extends('layouts.app')
@section('head_style')
    <link rel="stylesheet" href="{{URL::to('/')}}/css/jquery-te-1.4.0.css">
@endsection
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-app="myApp" ng-controller="pageController">
        <h5>Creat new page.</h5>
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
        <ul class="nav nav-tabs">
            <li class="active"><a href="#home" data-toggle="tab">Page content</a>
            </li>   
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="home">
                <br>
                <form action='@{{ action }}' method="POST" enctype="multipart/form-data">
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Title</span>
                        <input type="text" class="form-control" name="title" ng-model="page.title"/>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Slug</span>
                        <input type="text" class="form-control" name="slug" ng-model="page.slug"/>
                    </div>
                    <br>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Content</span>
                        <textarea name="content" ng-model="page.content"></textarea>
                    </div>
                    <br>
                    <br>
                        {{ csrf_field() }}
                    <br>
                    <br>
                    <button class="btn btn-info">Submit</button>
                </form>
            </div>


        </div>


    </div>
@endsection
@section('footer_script')
    <script src="{{URL::to('/')}}/js/jquery-te-1.4.0.min.js"></script>
    <script src="{{URL::to('/')}}/js/angular.min.js"></script>
    <script>
        var app = angular.module('myApp', []);
        app.controller('pageController', function ($scope, $http) {
            $("textarea").jqte();
            $scope.category_ids = [];
            var token = '{!! csrf_token() !!}';
            $scope.action = "/admin/page/create";
            $scope.page = "";
            $scope.page.category_id = 'null';
            @if(isset($page))
                $scope.method = "PUT";
                $scope.page = {!! $page !!};
                $scope.action = "/admin/page/create/" + $scope.page.id;
                $("textarea").jqteVal($scope.page.content);
            @endif
            @if(Session::has('oldInput_page'))
                <?php
                    $oldInput = Session::get('oldInput_page');
                ?>
                $scope.page = '{!! json_encode($oldInput) !!}';
                $scope.page = (JSON.parse($scope.page));
            @endif
        });

    </script>
@endsection

