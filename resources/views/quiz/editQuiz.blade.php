@extends('layouts.app')

<!-- @section('css')
<link href="{{ asset('css/showLessons.css') }}" rel="stylesheet">
@endsection -->

@section('content')
<form action="/user/updateQuiz/{{$quiz->id}}" method="POST">
    @csrf
    <div class="container-fluid px-5">
        <div class="row">
            <div class="question col-md-6 form-group">
                <h4>Question</h4>
                <input type="text" required class="form-control" name="question" placeholder="" value="{{$quiz->question}}">
            </div>

            <div class="choices col-md-6 form-group">
                <h4>Choices</h4>

                @foreach($quiz->choices as $key => $value)
                    <input type="radio" name="answer" value="{{$value->id}}">
                    <input type="text" required class="form-control mb-3" name="choice[{{$value->id}}]" placeholder="" value="{{$value->choice}}">
                @endforeach
            </div>
            <div class="form-group text-right">
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/user/viewQuizzes/{{$quiz->lesson->id}}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</form>

@endsection('content')
