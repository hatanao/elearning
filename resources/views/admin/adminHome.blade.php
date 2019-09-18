@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="">


    @if (isset($success))
        <div class="alert alert-success">
            <ul>
                <li>{{$success}}</li>
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-3 col-lg-3">
            <div class="panel user-profile card p-3" style="height: -webkit-fill-available;">
                <div class="panel-body">
                    <div class="text-center">
                        <div class="avatar">
                            <img src="{{ Auth::user()->avatar }}" class="rounded-circle" style="width: 7rem;height: 7rem;">
                        </div>

                        <div class="py-3">
                            <h2>{{ Auth::user()->name }}</h2>
                            @if(Auth::user()->is_admin == 2)
                            <a href="/admin/create/admin" class="btn btn-primary">Create Admin</a>
                            @else
                            <a href="/user/edit/{{Auth::user()->id}}" class="btn btn-primary">Edit profile</a>
                            @endif
                        </div>

                        <div class="dropdown-divider my-2"></div>

                        <div class="row mt-15">
                            <div class="col-sm-6">
                                <div>following</div>
                                <strong><a href="/user/followingList">{{Auth::user()->following()->count()}}</a></strong>
                            </div>
                            <div class="col-sm-6">
                                <div>followers</div>
                                <strong><a href="/user/followerList">{{Auth::user()->followers()->count()}}</a></strong>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-lg-9 mb-4">
            <div class="row">
                <div class="col-md-11 col-lg-11 m-2">
                <div class="panel user-list">
                <div class="panel-heading pt-4 pl-4">
                    <h2>All Members</h2>
                    <div class="pull-right"> </div>
                </div>

                <div class="panel-body">
                    <div class="list-group p-4">
                       @foreach($users as $user)
                                <div class="list-group-item mb-1" style="background: rgba(29, 29, 29, 0.8);"> 
                                    <form class=" d-flex align-items-center" method="post" action="#">
                                        <img src="{{$user->avatar}}" class="rounded-circle" style="width:6vh; height:6vh;">
                                        <a class="pl-3" href="/user/profile/{{$user->id}}">{{$user->name}}</a>
                                        
                                        @if(Auth::user()->is_following($user->id))
                                        <div class="ml-auto" style="text-align: -webkit-right;">
                                            <a href="/user/unfollow/{{$user->id}}" class="btn" style="background-color:#860400;"> Unfollow </a>
                                            @switch()
                                            
                                            <a href="/admin/delete/{{$user->id}}" class="btn btn-danger"> Delete </a>
                                            @else
                                            <a href="/admin/delete/{{$user->id}}" class="btn btn-danger"> Delete </a>
                                            @endif
                                        </div>
                                        @else
                                        <div class="ml-auto" style="text-align: -webkit-right;">
                                            <a href="/user/follow/{{$user->id}}" class="btn btn-primary"> Follow</a>
                                            @if($user->is_admin == 0)
                                            <a href="/admin/delete/{{$user->id}}" class="btn btn-danger"> Delete </a>
                                            @endif
                                        </div>
                                        @endif
                                    </form>
                                </div>
                        @endforeach
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection
