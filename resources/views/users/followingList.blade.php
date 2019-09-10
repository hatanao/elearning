@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-8 offset-2">
            <div class="panel user-list">
                <div class="panel-heading p-4">
                    <h2>All Members</h2>
                    <div class="pull-right"> </div>
                </div>

                    <table class="table table-borderless">
                       @foreach($users as $user)
                       @if($user->id != Auth::user()->id)
                           <tr>
                               <td class="align-middle">
                                    <img src="{{$user->avatar}}" style="width:50px;height:50px;">
                                    <a class="pl-3" href="/user/profile/{{$user->id}}">{{$user->name}}</a>
                                </td>
                                @if(Auth::user()->is_following($user->id))
                                <td class="align-middle">
                                    <div class="ml-auto">
                                        <a href="/user/unfollow/{{$user->id}}" class="btn btn-danger"> Unfollow </a>
                                    </div>
                                </td>
                                @else
                                <td class="align-middle">
                                    <div class="ml-auto">
                                        <a href="/user/follow/{{$user->id}}" class="btn btn-primary"> Follow</a>
                                    </div>
                                </td>
                                @endif
                            </tr>
                        @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection