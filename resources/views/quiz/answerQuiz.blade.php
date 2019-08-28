@extends('layouts.app')

<!-- @section('css')
<link href="{{ asset('css/showLessons.css') }}" rel="stylesheet">
@endsection -->

@section('content')
<form action="/user/updateQuiz/{{$lessonId}}" method="POST">
    @csrf
    <div class="container-fluid bg-brand">
        <div class="in-front">
            <div class="row question ">
            @foreach($quizzes as $index => $quiz)
                <div class="choices col-md-12 form-group">
                    <p>
                        <strong>
                            Q.{{$index + 1}}
                        </strong>
                        : {{$quiz->question}}
                    </p>
                @foreach($quiz->choices as $key => $value)
                    <label class="d-block">
                        <input type="radio" name="answer" value="{{$key}}">{{$value->choice}}
                    </label>
                @endforeach
                </div>
            @endforeach
                <div class="form-group text-right mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $quizzes->links() }}
        </div>
    </div>
</form>
@endsection('content')
