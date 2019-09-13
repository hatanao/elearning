@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
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
                <div class="card text-center">
                    <img src="{{$lesson->user->avatar}}" class="card-img-top">
                    <div class="card-body">
                        <h2 class="">{{$lesson->title}}</h2>
                        <p class="">{{$lesson->quizzes()->count()}} Quiz</p>
                      <a href="/user/answerQuiz/{{$lesson->id}}" class="btn btn-block btn-primary">Start</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection('content')