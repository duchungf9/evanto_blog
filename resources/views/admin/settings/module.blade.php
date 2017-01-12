@extends('layouts.app')
@section('head_style')
    <style>
        * {
            box-sizing: border-box;
        }

        .module-card-wrap {
            max-width: 70%;
            display: flex;
            flex-wrap: wrap;
            margin: 0 auto;
        }

        .module-card {
            background: #fff;
            border: 1px solid #f1f1f1;
            box-shadow: 1px 1px 2px rgba(0,0,0,0.05);
            min-width: 100%;
            padding: 10px;
            margin-bottom: 5%;
            display: flex;
            flex-direction: column;
        }

        .module-card-title {
            font-size: 120%;
            font-weight: 700;
        }

        .module-card-meta {
            display: flex;
        }

        .module-card-category, .module-card-author {
            flex: 1;
        }

        .module-card-author {
            text-align: right;
        }

        .module-card-bottom {
            display: flex;
            flex-direction: column;
            flex-grow: 1; /* a flex: 1 also works here, but is buggy on IE11 */
        }

        .module-card-img {
            margin: 20px 0;
            align-self: center;
            width: 100%;
            height: auto;
        }

        .module-card-button {
            background: seagreen;
            color: white;
            border: none;
            margin-top: auto;
            padding: 10px;
        }

        @media screen and (min-width: 600px) {
            .module-card {
                width: 48%;
                margin: 0 auto 2%;
                min-width: 0;
            }
        }

    </style>
@endsection
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-app="myApp" ng-controller="moduleController">
        <h5>Modules Manager</h5>
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
        <p></p>
        <div class="module-card-wrap">
            @if(isset($params['about_us']))
                <div class="module-card">
                    <div class="module-card-title">Contact</div>
                    <div class="module-card-bottom">
                        <div>
                            <textarea name="" id="" cols="65" rows="10">

                            </textarea>
                        </div>
                        <button class="module-card-button">Save</button>
                    </div>
                </div>
            @endif
            @if(isset($params['links']))

            @endif
        </div> <!-- /module-card-wrap -->
    </div>
@endsection
@section('footer_script')
    <script src="{{URL::to('/')}}/js/angular.min.js"></script>
    <script>
        var app = angular.module('myApp',[]);
        app.controller('moduleController',function($scope,$http){
            $scope.list = "";

            var token = '{{csrf_token()}}';
        });
    </script>

@endsection
