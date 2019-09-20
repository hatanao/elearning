@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- <form action="/search" method="POST" role="search">
                {{ csrf_field() }}
                    <div class="input-group">
                        <input type="text" class="form-control" name="q"
                            placeholder="Search users"> <span class="input-group-btn">
                            <button type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                        </span>
                    </div>
            </form> -->
            <div class="panel user-list">
                <h2 class="heading-title p-2">User List</h2>

                <div class="panel-body">
                    <div class="list-group">
                       @foreach($users as $user)
                        @if($user->id != Auth::user()->id)
                            <div class="list-group-item mb-1" style="background: rgba(29, 29, 29, 0.8);"> 
                                <form class=" d-flex align-items-center" method="post" action="#">
                                    <img src="{{$user->avatar}}" class="rounded-circle" style="width: 7vh;height: 7vh;">
                                    <a class="pl-3" href="/user/profile/{{$user->id}}">{{$user->name}}</a>
                                    
                                    @if(Auth::user()->is_following($user->id))
                                    <div class="ml-auto">
                                        <a href="/user/unfollow/{{$user->id}}" class="btn btn-danger"> Unfollow </a>
                                    </div>
                                    @else
                                    <div class="ml-auto">
                                        <a href="/user/follow/{{$user->id}}" class="btn btn-primary" onclick="this.addEventListener('click', clickStopper, false);"> Follow</a>
                                    </div>
                                    @endif
                                </form>
                            </div>
                            @endif
                        @endforeach
                        @isset($activities)
                            <div class="d-flex justify-content-center pt-4">
                                {{ $users->appends('activities',  $activities->currentPage())->links() }}
                            </div>
                        @endisset
                    </div>
                </div>
                @isset($activities)
                    <h2 class="heading-title pl-2 pt-4 pb-2">User Activities</h2>
                    <div class="list-group ">
                        @foreach($activities as $activity)
                            <div class="list-group-item " style="background: rgba(29, 29, 29, 0.8); color:white;">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="{{$activity->user->avatar}}" alt="" style="width: 7vh; height: 7vh;">
                                    <h4 class="pl-3">{{$activity->message}}</h4> 
                                    <small class="text-muted pl-2">{{$activity->created_at->diffForHumans()}}</small>
                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-center pt-4">
                            {{ $activities->appends('users',  $users->currentPage())->links() }}
                        </div>
                    </div>
                @endisset


            </div>
        </div>
    </div>
</div>
@endsection