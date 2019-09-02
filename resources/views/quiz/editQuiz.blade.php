@extends('layouts.app')

<!-- @section('css')
<link href="{{ asset('css/showLessons.css') }}" rel="stylesheet">
@endsection -->

@section('content')
<form action="/user/updateQuiz/{{$quiz->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container-fluid px-5">
        <div class="row">
            <div class="question col-md-6 form-group">
                <h4>Question</h4>
                <input type="text" required class="form-control mb-3" name="question" placeholder="" value="{{$quiz->question}}">
                @if($quiz->image)
                    <img src={{$quiz->image}} style="width:15vh; height:15vh;">
                @endif
                <div class="py-2">
                    <input type="file" name="image" class="col-lg-8">
                </div>
            </div>

            <div class="choices col-md-6 form-group">
                <h4>Choices</h4>

                @foreach($quiz->choices as $key => $value)
                    <input type="radio" name="answer" value="{{$value->id}}">
                    <input type="text" required class="form-control mb-3" name="choice[{{$value->id}}]" placeholder="" value="{{$value->choice}}">
                @endforeach
            </div>
            <div class="form-group col-md-12" style="text-align: end;">
                <button type="submit" class="btn btn-primary mr-2">Save</button>
                <a href="/user/viewQuizzes/{{$quiz->lesson->id}}" class="btn btn-secondary">Back</a>
            </div>
        </div>
    </div>
</form>

@endsection('content')
