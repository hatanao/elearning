@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container in-front">
    
    <ul class="nav nav-tabs mb-5">
        <li class="nav-item">
            <a class="nav-link" href="/user/lessons">All Lessons</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/myLessons">My Lessons</a>
        </li>
    </ul>
    
    <div class="row">
        @foreach($sortedLessons as $lesson)
        <div class="col-sm-12 col-md-6 col-lg-4  mb-4">
            <div class="card" style="width: 18rem; height: 18rem;">
                <img src="{{$lesson->user->avatar}}" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{$lesson->title}}</h5>
                    <p class="card-text">{{$lesson->description}}</p>
                    <a href="#" class="btn btn-primary">Start</a>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection('content')