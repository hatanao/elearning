@extends('layouts.app')

<!-- @section('css')
<link href="{{ asset('css/showLessons.css') }}" rel="stylesheet">
@endsection -->

@section('content')
<form action="/user/updateQuiz/{{$quiz->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container-fluid">
        <div class="alert alert-danger" role="alert">
            Make sure to select the correct answer when you store choices!
        </div>
        <div class="row">
            <div class="question col-md-6 form-group">
                <h2 class="pb-2">Question</h2 >
                <input type="text" required class="form-control mb-3" name="question" placeholder="" value="{{$quiz->question}}">
                @if($quiz->image)
                    <img src={{$quiz->image}} class="m-3" style="width: 90%;height: auto;">
                @endif
                <div class="py-2">
                    <input type="file" name="image" class="col-lg-8">
                </div>
            </div>

            <div class="choices col-md-6 form-group">
                <h2 class="pb-2">Choices</h2 >

                @foreach($quiz->choices as $key => $value)
                @if($quiz->answer_id == $value->id)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer" value="{{$value->id}}" checked>
                    <input type="text" required class="form-control mb-3" name="choice[{{$value->id}}]" placeholder="" value="{{$value->choice}}">
                </div>
                @else
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="answer" value="{{$value->id}}">
                    <input type="text" required class="form-control mb-3" name="choice[{{$value->id}}]" placeholder="" value="{{$value->choice}}">
                </div>
                @endif
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
