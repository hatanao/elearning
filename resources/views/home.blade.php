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
                            <h2>{{ Auth::user()->name }}</h2>
                            <a href="/user/edit/{{Auth::user()->id}}" class="btn btn-primary">Edit profile</a>
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
            <h2 class="pt-5 pb-3 pl-3 heading-title">Completed Lessons</h2>
            <div class="row">
                @foreach($completeLessons as $completeLesson)
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="card text-center mb-4">
                            
                            <span class="text-left complete-lesson">
                                <img src="https://d2aj9sy12tbpym.cloudfront.net/javascripts/dist/assets/completed-ribbon-7d6635446596de8f57bc0063186c8b32.svg" class="lesson-card__completed-count-ribbon">
                                <img src="https://d2aj9sy12tbpym.cloudfront.net/javascripts/dist/assets/times-4e6bf2a5e8516ff8c7be9dcf954ff083.svg" class="lesson-card__completed-count-times">
                                {{$completeLesson->times}}
                            </span>
                            <img src="{{$completeLesson->lesson->user->avatar}}" class="card-img-top">
                            <div class="card-body">
                                <h2 class="">{{$completeLesson->lesson->title}}</h2>
                                <p class="">{{$completeLesson->lesson->description}}</p>
                                <p class="">{{$completeLesson->lesson->quizzes()->count()}} Quiz</p>
                                <a href="/user/answerQuiz/{{$completeLesson->lesson_id}}" class="btn btn-block btn-primary">Review</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
