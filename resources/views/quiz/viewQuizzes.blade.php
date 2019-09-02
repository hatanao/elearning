@extends('layouts.app')

<!-- @section('css')
<link href="{{ asset('css/showLessons.css') }}" rel="stylesheet">
@endsection -->

@section('content')
<div class="container-fluid">
  <div class="">
    <div class="row" style="justify-content: flex-end;">
      <div class="float-right pr-5 mb-3">
          <a href="/user/addQuiz/{{$lesson_id}}" class="btn btn-primary" style>add Quiz</a>
      </div>
    </div>
    <div class="row text-center">
      @foreach($quizzes as $quiz)
        <div class="col-md-6 col-lg-4">
          <div class="card mb-4">
            <div class="card-body row">
              @if($quiz->image)
                <h5 class="card-title col-8">{{$quiz->question}}</h5>
                <img src="{{$quiz->image}}" class="col-4" alt="" style="width: 10vw; height: 10vw;">
              @else
                <h5 class="card-title">{{$quiz->question}}</h5>
              @endif
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
    <div class="d-flex pt-3 justify-content-center">
          {{ $quizzes->links() }}
    </div>
  </div>
</div>
@endsection('content')