@extends('layouts.app')

@section('content')
<form class="form-prevent-multiple-submits" action="/user/storeQuiz/{{$lesson_id}}" method="POST" enctype="multipart/form-data">
@csrf
<div class="container-fluid px-5">
    <div class="alert alert-danger" role="alert">
        Make sure to select the correct answer when you store choices!
    </div>
    <div class="row">
        <div class="question col-md-6 form-group">
            <h4>Question</h4>
            <input type="text" required class="form-control mb-3" name="question" placeholder="">
            <input type="file" name="image">
        </div>

        <div class="choices col-md-6 form-group">
            <h4>Chocies</h4>

            @foreach(range(0, 3) as $i)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="answer" value="{{$i}}" required>
                <input type="text" required class="form-control mb-3" name="choice[]" placeholder="">
            </div>
            @endforeach
            
        </div>
        <div class="form-group col-md-12" style="text-align: end;">
            <button type="submit" class="btn btn-primary mr-2 btn-prevent-multiple-submits">Add</button>
            <a href="/user/viewQuizzes/{{$lesson_id}}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>

@endsection('content')
