<!-- @extends('layouts.app')

@section('css')
<link href="{{ asset('css/bg-image.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid px-5 bg-brand" >
    <div class="in-front">
        <span class="float-right pr-5 mb-3">
            <a href="/user/addLesson/{{Auth::user()->id}}" class="btn btn-primary" style>add lesson</a>
        </span>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($lessons as $lesson)
            <tr>
            <td scope="row">{{$lesson->title}}</td>
            <td>{{$lesson->description}}</td>
            <td>
                <a href="/user/viewQuizzes/" class="">view quiz</a>      
                <a href="/user/editLesson/{{$lesson->id}}" class="btn btn-secondary btn-sm">Edit</a>      
                <a href="/user/delete/{{$lesson->id}}" class="btn btn-danger btn-sm">Delete</a>
            </td>
            </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection('content') -->