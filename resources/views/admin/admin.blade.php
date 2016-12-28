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

                        <h4>Total User(s)</h4>
                        <h5>1</h5>
                    </a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html" >

                        <h4>Total Blog post(s)</h4>
                        <h5>1</h5>
                    </a>
                </div>
            </div>
        </div>
        <div class="row text-center pad-top">
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="/admin/category/list" >
                        <i class="fa fa-windows fa-5x"></i>
                        <h4>Categories</h4>
                    </a>
                </div>

            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html" >
                        <i class="fa fa-envelope-o fa-5x"></i>
                        <h4>Mail Box</h4>
                    </a>
                </div>


            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html" >
                        <i class="fa fa-lightbulb-o fa-5x"></i>
                        <h4>New Issues</h4>
                    </a>
                </div>


            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html" >
                        <i class="fa fa-users fa-5x"></i>
                        <h4>See Users</h4>
                    </a>
                </div>


            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html" >
                        <i class="fa fa-key fa-5x"></i>
                        <h4>Admin </h4>
                    </a>
                </div>


            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                <div class="div-square">
                    <a href="blank.html" >
                        <i class="fa fa-comments-o fa-5x"></i>
                        <h4>Support</h4>
                    </a>
                </div>


            </div>
        </div>
        <!-- /. ROW  -->
        <div class="row">
            <div class="col-lg-12 ">
                <br/>
                <div class="alert alert-danger">
                    <strong>Want More Icons Free ? </strong> Checkout fontawesome website and use any icon <a target="_blank" href="http://fortawesome.github.io/Font-Awesome/icons/">Click Here</a>.
                </div>

            </div>
        </div>
        <!-- /. ROW  -->
    {{--</div>--}}

@endsection
