@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="panel user-profile bg-white p-3">
                <div class="panel-body">
                    <div class="text-center">
                        <div class="avatar">
                            <img src="/img/{{ Auth::user()->avatar }}" class="rounded-circle">
                        </div>

                        <div class="py-2">
                            <h2>{{ Auth::user()->name }}</h2>
                            <a href="/user/edit/{{Auth::user()->id}}" class="btn btn-primary">Edit profile</a>
                        </div>

                        <div class="dropdown-divider my-2"></div>

                        <div class="row mt-15">
                            <div class="col-sm-6">
                                <strong><a href="/user/followinglist"></a></strong>
                                <div>following</div>
                            </div>
                            <div class="col-sm-6">
                                <strong><a href="/user/followerslist"></a></strong>
                                <div>followers</div>
                            </div>        
                        </div>

                        <div class="dropdown-divider my-3"></div>

                        <div class="media bg-light ">
                            <div class="media-body">
                                <div class="btn-group btn-group-justified d-flex justify-content-center py-2">
                                    <div class="well text-center">
                                        <h4></h4>
                                        <small>blogs posted</small>
                                    </div>
                                </div>
                            </div>
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
