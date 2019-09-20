@extends('layouts.app')

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
            <div class="col-sm-12 col-md-6 col-lg-4 mb-4 d-flex">
                <div class="card text-center flex-fill p-0">
                    <img src="{{$lesson->image}}" class="card-img-top">
                    <p class="pt-3 m-0">Author: {{$lesson->user->name}}</p>
                    <div class="card-body">
                        <h2 class="">{{$lesson->title}}</h2>
                        <p class="">{{$lesson->description}}</p>
                        <p class="">{{$lesson->quizzes()->count()}} Quiz</p>
                      <a href="/user/answerQuiz/{{$lesson->id}}" class="btn btn-block btn-primary">Start</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center pt-4">
        {{ $sortedLessons->links() }}
    </div>
</div>
@endsection('content')