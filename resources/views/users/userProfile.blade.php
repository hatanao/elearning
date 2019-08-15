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
                            <div class="default">
                                <img src="{{ Auth::user()->avatar }}" class="rounded-circle" style="width: 75px;">
                            </div>
                        </div>

                        <div class="py-2">                        
                            <h2>{{ $user->name }}</h2>
                                @if(Auth::user()->is_following($user->id))
                                    <div class="ml-auto">
                                        <a href="/user/unfollow/{{$user->id}}" class="btn btn-danger"> Unfollow </a>
                                    </div>
                                @else
                                    <div class="ml-auto">
                                        <a href="/user/follow/{{$user->id}}" class="btn btn-primary"> Follow</a>
                                    </div>
                                @endif
                        </div>
                        <div class="dropdown-divider my-2"></div>

                        <div class="row mt-15">
                            <div class="col-sm-6">
                                <strong><a href="/users/followingList">{{ $user->following()->count() }}</a></strong>
                                <div>following</div>
                            </div>
                                <div class="col-sm-6">
                                    <strong><a href="/users/followerList">{{ $user->followers()->count() }}</a></strong>
                                <div>followers</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-8">
            <div class="activity-feed">
                <div class="well bg-white">
                    <div class="page-header pt-3 pl-3 pr-3 text-center"><h2>Activity Log</h2></div>
                    <div class="dropdown-divider mx-5"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection