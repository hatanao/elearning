@extends('layouts.app')

<!-- @section('css')
<link href="{{ asset('css/showLessons.css') }}" rel="stylesheet">
@endsection -->

@section('content')
@csrf
<form action="/user/storeLessons/{{Auth::user()->id}}" method="POST">
<div class="container-fluid px-5">
    <div class="row">
        <div class="question col-md-6 form-group">
            <h4>Question</h4>
            <input type="text" required class="form-control" name="question" placeholder="">
        </div>

        <div class="choices col-md-6 form-group">
            <h4>Chocies</h4>
            <input type="text" required class="form-control mb-3" name="choice" placeholder="">
            <input type="text" required class="form-control mb-3" name="choice" placeholder="">
            <input type="text" required class="form-control mb-3" name="choice" placeholder="">
            <input type="text" required class="form-control" name="choice" placeholder="">
        </div>
        <div class="form-group text-right">
            <button type="submit" class="btn btn-primary">Add</button>
            <a href="" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>

@endsection('content')
