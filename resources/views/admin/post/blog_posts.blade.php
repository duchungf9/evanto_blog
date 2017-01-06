@extends('layouts.app')
@section('head_style')
    <link rel="stylesheet" href="{{URL::to('/')}}/css/jquery-te-1.4.0.css">
@endsection
@section('content')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-app="myApp" ng-controller="postController">
        <h5>Creat new Post.</h5>
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
            <li class="active"><a href="#home" data-toggle="tab">Post content</a>
            </li>
            <li class=""><a href="#tag" data-toggle="tab">Post's Tags</a>
            </li>
            <li class=""><a href="#meta" data-toggle="tab">Social meta data</a>
            </li>

        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="home">
                <br>
                <form action='@{{ action }}' method="POST" enctype="multipart/form-data">
                    <div class="input-group">
                        <span class="input-group-addon">Image preview</span>
                        <img src="@{{ post.image }}" ng-model="post.image"/>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Category ID</span>
                        <select name="category_id" id="category_id" class="selectbox" ng-model="post.category_id">
                            <option value="null">--chose category--</option>
                            <option value="@{{ cat.id }}" ng-repeat="(key,cat) in category_ids"
                                    ng-selected="post.category_id">@{{ cat.name }}</option>
                        </select>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Title</span>
                        <input type="text" class="form-control" name="title" ng-model="post.title"/>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Slug</span>
                        <input type="text" class="form-control" name="slug" ng-model="post.slug"/>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Image</span>
                        <input type="file" class="form-control" name="image"/>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Description</span>
                        <input type="text" class="form-control" name="description" ng-model="post.description"/>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Summary</span>
                        <input type="text" class="form-control" name="summary" ng-model="post.summary"/>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Content</span>
                        <textarea name="content" ng-model="post.content"></textarea>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Status (hide or show)</span>
                        <select name="status" id="status" class="selectbox">
                            <option value="">--chose status--</option>
                            <option value="draft" <?php echo (isset($post) and $post->status == 'draft') ? 'selected' : ""; ?>>
                                hide
                            </option>
                            <option value="publish" <?php echo (isset($post) and $post->status == 'publish') ? 'selected' : ""; ?>>
                                show
                            </option>
                        </select>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon">Featured</span>
                        <select name="featured" id="featured" class="selectbox">
                            <option value="">--chose status--</option>
                            <option value="0" <?php echo (isset($post) and $post->featured == 0) ? 'selected' : ""; ?>>
                                No
                            </option>
                            <option value="1" <?php echo (isset($post) and $post->featured == 1) ? 'selected' : ""; ?>>
                                Yes
                            </option>
                        </select>
                    </div>
                    <br>
                    {{ csrf_field() }}
                    @if(isset($post))
                        {{ method_field('PUT') }}
                    @endif
                    <br>
                    <br>
                    <button class="btn btn-info">Submit</button>
                </form>

            </div>
            <div class="tab-pane fade" id="tag">
                <div ng-show="post!=''">
                    <p></p>
                    <label for="">Tags remain on this post:</label>
                    <ul>
                        <li ng-repeat="tag in tags">@{{ tag }}</li>
                    </ul>
                    <h4>Tags separated by commas</h4>
                    <input type="text" ng-model="input_tags" placeholder="..Input tag here">
                    <button class="btn btn-primary" ng-click="saveTag()">Save</button>
                </div>
                <div ng-show="post==''">
                    <h2>you need to save the article before adding Tags</h2>
                </div>

            </div>
            <div class="tab-pane fade" id="meta">
                <div ng-show="post!=''">
                    <br>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                        <div class="input-group">
                            <span class="input-group-addon">Tittle</span>
                            <input type="text" class="form-control" ng-model="social_title"/>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Description</span>
                            <input type="text" class="form-control" ng-model="social_desc"/>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">URL</span>
                            <input type="text" class="form-control" ng-model="social_url"/>
                        </div>
                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Image</span>
                            <input type="text" class="form-control" ng-model="social_image"/>
                        </div>

                        <br>
                        <div class="input-group">
                            <span class="input-group-addon">Type</span>
                            <select class="form-control" ng-model="social_type" id="type" name="type">
                                <option value="article">Article</option>
                                <option value="book">Book</option>
                                <option value="books.author">Book Author</option>
                                <option value="books.genre">Book Genre</option>
                                <option value="business.business">Business</option>
                                <option value="fitness.course">Fitness Course</option>
                                <option value="music.album">Music Album</option>
                                <option value="music.musician">Music Musician</option>
                                <option value="music.playlist">Music Playlist</option>
                                <option value="music.radio_station">Music Radio Station</option>
                                <option value="music.song">Music Song</option>
                                <option value="object">Object (Generic Object)</option>
                                <option value="place">Place</option>
                                <option value="product">Product</option>
                                <option value="product.group">Product Group</option>
                                <option value="product.item">Product Item</option>
                                <option value="profile">Profile</option>
                                <option value="quick_election.election">Election</option>
                                <option value="restaurant">Restaurant</option>
                                <option value="restaurant.menu">Restaurant Menu</option>
                                <option value="restaurant.menu_item">Restaurant Menu Item</option>
                                <option value="restaurant.menu_section">Restaurant Menu Section</option>
                                <option value="video.episode">Video Episode</option>
                                <option value="video.movie">Video Movie</option>
                                <option value="video.tv_show">Video TV Show</option>
                                <option value="video.other">Video Other</option>
                                <option value="website">Website</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <pre id="output">
                        &lt;!-- Schema.org markup for Google+ --&gt;
                        &lt;meta itemprop=&quot;name&quot; content=&quot;@{{social_title}}&quot;&gt;
                        &lt;meta itemprop=&quot;description&quot; content=&quot;@{{social_desc}}&quot;&gt;
                        &lt;meta itemprop=&quot;image&quot; content=&quot;@{{social_image}}&quot;&gt;

                        &lt;!-- Open Graph data --&gt;
                        &lt;meta property=&quot;og:title&quot; content=&quot;@{{social_title}}&quot; /&gt;
                        &lt;meta property=&quot;og:author&quot; content=&quot;@{{social_title}}&quot; /&gt;
                        &lt;meta property=&quot;og:type&quot; content=&quot;@{{social_type}}&quot; /&gt;
                        &lt;meta property=&quot;og:url&quot; content=&quot;@{{social_url}}&quot; /&gt;
                        &lt;meta property=&quot;og:image&quot; content=&quot;@{{social_image}}&quot; /&gt;
                        &lt;meta property=&quot;og:description&quot; content=&quot;@{{social_desc}}&quot;&gt;
                        &lt;meta property=&quot;og:site_name&quot; content=&quot;@{{social_title}}&quot; /&gt;
                    </pre>
                        <button class="btn btn-primary btn-block" ng-click="savemeta()">Save</button>

                    </div>
                    <br>
                </div>
                <div ng-show="post==''">
                    <h2>you need to save the article before adding Social's meta</h2>
                </div>
            </div>

        </div>


    </div>
@endsection
@section('footer_script')
    <script src="{{URL::to('/')}}/js/jquery-te-1.4.0.min.js"></script>
    <script src="{{URL::to('/')}}/js/angular.min.js"></script>
    <script>
        var app = angular.module('myApp', []);
        app.controller('postController', function ($scope, $http) {
            $("textarea").jqte();
            $scope.category_ids = [];
            var token = '{!! csrf_token() !!}';
            $scope.action = "/admin/post";
            $scope.post = "";
            $scope.post.category_id = 'null';
            @if(isset($post))
                $scope.method = "PUT";
                $scope.post = {!! $post !!};
                $scope.action = "/admin/post/" + $scope.post.id;
                $("textarea").jqteVal($scope.post.content);
            @endif
            @if(Session::has('oldInput'))
                <?php
                    $oldInput = Session::get('oldInput');
                ?>
                $scope.post = '{!! json_encode($oldInput) !!}';
                $scope.post = (JSON.parse($scope.post));
            @endif
            $http.post(
                    '/admin/post/get_cat_ids',
                    $.param({_token: token}),
                    {headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}}
            ).then(
                    function (response) {
                        if (typeof response.data == 'object') {
                            $scope.category_ids = response.data;
                        }
                    }, function (response) {
                    }
            );
            @if(isset($tags))
                $scope.tags = [
                    @foreach($tags as $tag)
                        '{!! $tag !!}',
                    @endforeach
                ];
            @endif
                    @if(isset($post->json_params))
                        <?php
                            $json_params = json_decode($post->json_params);
                        ?>
                        @if(isset($json_params->title))
                            $scope.social_title = '{!! $json_params->title !!}';
                        @endif
                        @if(isset($json_params->desc))
                                $scope.social_desc = '{!! $json_params->desc !!}';
                        @endif
                        @if(isset($json_params->url))
                                $scope.social_url = '{!! $json_params->url !!}';
                        @endif
                        @if(isset($json_params->image))
                                $scope.social_image = '{!! $json_params->image !!}';
                        @endif
                        @if(isset($json_params->type))
                                $scope.social_type = '{!! $json_params->type !!}';
                        @endif
                    @endif
                $scope.saveTag = function () {
                $http.post(
                        '/admin/post/savetags',
                        $.param({_token: token, tags: $scope.input_tags, pid: $scope.post.id}),
                        {headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}}
                ).then(
                        function (response) {
                            if (typeof response.data == 'object') {
                                $scope.tags = response.data;

                            }
                        }, function (response) {
                        }
                );
            }
                $scope.savemeta = function(){
                    $http.post(
                            '/admin/post/savemeta',
                            $.param({
                                _token: token,
                                tags: $scope.input_tags,
                                pid: $scope.post.id,
                                title: $scope.social_title,
                                desc: $scope.social_desc,
                                url: $scope.social_url,
                                image: $scope.social_image,
                                type: $scope.social_type
                            }),
                            {headers: {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'}}
                    ).then(
                            function (response) {
                                if (response.data == 'ok') {
                                    alert('saved!');
                                }else if(response.data=='false'){
                                    alert('You must save the post\'s content first!');
                                }
                            }, function (response) {
                            }
                    );
                }
        });

    </script>
@endsection

