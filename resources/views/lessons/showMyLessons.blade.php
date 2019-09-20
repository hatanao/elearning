@extends('layouts.app')

@section('css')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="container in-front">
    <ul class="nav nav-tabs ">
        <li class="nav-item">
            <a class="nav-link" href="/user/lessons">All Lessons</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/user/myLessons">My Lessons</a>
        </li>
    </ul>
    <div class="row py-4" style="justify-content: flex-end;">
        <div class="text-right pr-4">
            <a href="/user/addLesson/{{Auth::user()->id}}" class="btn btn-primary" style>Add Lesson</a>
        </div>
    </div>
    <div class="row">
        @foreach($lessons as $lesson)
        <div class="col-sm-12 col-md-6 col-lg-4 mb-4 d-flex">
            <div class="card flex-fill p-0" style="background: rgba(29, 29, 29, 0.8);">
                <img src="{{$lesson->image}}" class="card-img-top" alt="lesson-image">
                <div class="card-body text-center">
                    <h2 class=""><a href="/user/viewQuizzes/{{$lesson->id}}">{{$lesson->title}}</a></h2>
                    <p class="">{{$lesson->description}}</p>
                    <p class="">{{$lesson->quizzes()->count()}} Quiz</p>
                        <div>
                            <a href="/user/answerQuiz/{{$lesson->id}}" class="btn btn-primary btn-block mb-3 {{$lesson->quizzes->count() ? '' : 'disabled'}}">
                                Start
                            </a>

                            <a href="/user/editLesson/{{$lesson->id}}" class="btn btn-secondary btn-sm mr-2">Edit</a>      
                            <a href="/user/delete/{{$lesson->id}}" onclick="return confirm('Are you sure to delete the lesson? All the quizzes inside will be deleted.')" class="btn btn-danger btn-sm">Delete</a>
                        </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <div class="d-flex justify-content-center pt-4">
        {{ $lessons->links() }}
    </div>
</div>
@endsection('content')