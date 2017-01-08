@extends('layouts.app')

@section('content')
    {{--<div id="page-inner">--}}
        <div class="row">
            <div class="col-lg-12">
                <h2>ADMIN DASHBOARD</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-lg-12 ">
                <div class="alert alert-info">
                    <strong>Welcome {{ Auth::user()->name }} ! </strong> You Have No pending Task For Today.
                </div>

            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row text-center pad-top">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html" >

                        <h4>Total Categories</h4>
                        <h5>{!! $infos['cats'] !!}</h5>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html" >

                        <h4>Total Blog post(s)</h4>
                        <h5>{!! $infos['posts'] !!}</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="row text-center pad-top">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="/admin/category/list" >
                        <i class="fa fa-bars fa-5x"></i>
                        <h4>Category</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="/admin/post/list" >
                        <i class="fa fa-file-text-o fa-5x"></i>
                        <h4>Post</h4>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="/admin/settings/profile" >
                        <i class="fa fa-users fa-5x"></i>
                        <h4>Profile</h4>
                    </a>
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
        <!-- /. ROW  -->
    {{--</div>--}}

@endsection
