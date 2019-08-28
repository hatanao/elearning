@extends('layouts.app')

<!-- @section('css')
<link href="{{ asset('css/showLessons.css') }}" rel="stylesheet">
@endsection -->

@section('content')
<div class="container-fluid bg-brand" style="margin-top: -1.5rem;">
  <div class="in-front">
    <div class="row" style="justify-content: flex-end;">
      <div class="float-right pr-5 mb-3">
          <a href="/user/addQuiz/{{$lesson_id}}" class="btn btn-primary" style>add Quiz</a>
      </div>
    </div>
    <div class="row">
      @foreach($quizzes as $quiz)
        <div class="col-lg-3 col-md-3">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">{{$quiz->question}}</h5>
            </div>
            <ul class="list-group list-group-flush">
              @foreach($quiz->choices as $choice)
              <li class="list-group-item">{{$choice->choice}}</li>
              @endforeach
            </ul>
            <div class="card-body">
              <a href="/user/editQuiz/{{$quiz->id}}" class="btn btn-secondary btn-sm card-link">Edit</a>      
              <a href="/user/deleteQuiz/{{$quiz->id}}" class="btn btn-danger btn-sm card-link">Delete</a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
@endsection('content')