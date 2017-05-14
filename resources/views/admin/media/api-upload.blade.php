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
            <button class="btn btn-warning" data-toggle="modal" data-target="#myModal">-->UPLOAD NEW IMAGE<--</button>
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
    <script>
        $("#uploaderForm").submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);

            $.ajax({
                url: window.location.pathname,
                type: 'POST',
                beforeSend:function(){
                    alert('uploading...');
                },
                data: formData,
                async: false,
                success: function (data) {

                },
                cache: false,
                contentType: false,
                processData: false
            });

            return false;
        });
    </script>
@endsection

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Uploader.</h4>
            </div>
            <div class="modal-body">
                <form action="/admin/media/picasa-upload" method="post" enctype="multipart/form-data" id="uploaderForm">
                    <div class="input-group">
                        <label for="">Image Title</label><input type="text" name="title">
                    </div>

                    <div class="input-group">
                        <label for="">Image Description</label><input type="text" name="description">
                    </div>
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <input type="file" accept="image/jpeg" class="btn" value="pick image" style="background: #f5f5f5;" name="image">
                    <button class="btn btn-primary">UPLOAD</button>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

</div>
