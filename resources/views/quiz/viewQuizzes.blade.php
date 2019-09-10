@extends('layouts.app')

<!-- @section('css')
<link href="{{ asset('css/showLessons.css') }}" rel="stylesheet">
@endsection -->

@section('content')
<div class="container-fluid bg-brand">
  <div class="in-front">
    <div class="row" style="justify-content: flex-end;">
      <div class="float-right pr-5 mb-3">
          <a href="/user/addQuiz/{{Auth::user()->id}}" class="btn btn-primary" style>add Quiz</a>
      </div>
    </div>
    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Question</h5>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Cras justo odio</li>
        <li class="list-group-item">Dapibus ac facilisis in</li>
        <li class="list-group-item">Vestibulum at eros</li>
        <li class="list-group-item">Vestibulum at eros</li>
      </ul>
      <div class="card-body">
        <a href="" class="btn btn-secondary btn-sm card-link">Edit</a>      
        <a href="" class="btn btn-danger btn-sm card-link">Delete</a>
      </div>
    </div>
  </div>
</div>
@endsection('content')