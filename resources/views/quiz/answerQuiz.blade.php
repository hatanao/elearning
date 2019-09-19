@extends('layouts.app')

@section('content')
<form class="form-prevent-multiple-submits" action="/user/{{$lessonId}}/quiz/{{$quiz->id}}/answer/submit" method="POST">
    @csrf
    <input type="hidden" name="lesson_taken_id" value={{$lessonTaken->id}}>
    <div class="container">
    <div class="card px-4">
            <div class="row">
                <div class="col-md-12 form-group">
                    <div class="row">

                        <h5 class="card-title col-8">
                          Q{{isset($quiz_number) ? $quiz_number : 1}}: {{$quiz->question}}
                        </h5>
                        @if($quiz->image)
                            <img src="{{$quiz->image}}" class="col-4" alt="" style="width: 8rem; height: 8rem;">
                        @endif
                    </div>
                    @foreach($quiz->choices as $key => $choice)
                        <label class="d-block">
                            <input type="radio" required name="answer" value="{{$choice->id}}"> {{$choice->choice}}
                        </label>
                    @endforeach
                    <div class="form-group text-right mt-3">
                        <button type="submit" class="btn btn-primary btn-prevent-multiple-submits">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection('content')
