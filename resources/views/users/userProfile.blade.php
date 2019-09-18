@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 col-lg-3">
            <div class="panel card p-3 mb-4">
                <div class="panel-body">
                    <div class="text-center">
                        <div class="avatar">
                            <img src="{{ Auth::user()->avatar }}" class="rounded-circle" style="width: 6rem;height: 6rem;">
                        </div>

                        <div class="py-3">                        
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
                                <div>following</div>
                                <strong><a href="/user/followingList/{{$user->id}}">{{ $user->following()->count() }}</a></strong>
                            </div>
                            <div class="col-sm-6">
                                <div>followers</div>
                                <strong><a href="/user/followerList/{{$user->id}}">{{ $user->followers()->count() }}</a></strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <h2 class="heading-title p-3">User Activities</h2>
                <div class="list-group">
                    @foreach($activities as $activity)
                    <div class="list-group-item" style="background: rgba(29, 29, 29, 0.8); color:white;">
                        <div class="d-flex align-items-center">
                            <h4 class="pl-3">{{$activity->message}}</h4> 
                            <small class="text-muted pl-2">{{$activity->created_at->diffForHumans()}}</small>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center pt-4">
                        {{ $activities->links() }}
                </div>
        </div>
    </div>
</div>
@endsection