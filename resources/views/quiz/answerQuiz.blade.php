@extends('layouts.app')

@section('content')
<form action="/user/{{$lessonId}}/quiz/{{$quiz->id}}/answer/submit" method="POST">
    @csrf
    <input type="hidden" name="lesson_taken_id" value={{$lessonTaken->id}}>
    <div class="container">
    <div class="card px-4">
            <div class="row question ">
                <div class="col-md-12 form-group">
                    <p>
                        <strong>
                        @foreach ($quiz as $key => $value)
                            {{ $loop->iteration }}
                        @endforeach
                        </strong>
                        : {{$quiz->question}}
                    </p>
                    @if($quiz->image)
                        <img src={{$quiz->image}} alt="" style="width: 5vw; height: 5vw;">
                    @endif
                    @foreach($quiz->choices as $key => $choice)
                        <label class="d-block">
                            <input type="radio" required name="answer" value="{{$choice->id}}">{{$choice->choice}}
                        </label>
                    @endforeach
                    <div class="form-group text-right mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection('content')
