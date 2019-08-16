@extends('layouts.app')

@section('css')
<link href="{{ asset('css/showLessons.css') }}" rel="stylesheet">
@endsection

@section('content')

<span class="float-right pr-5">
    <a href="/user/addLessons/{{Auth::user()->id}}" class="btn btn-primary" style>add lessons</a>
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
        <a href="/" class="">view quiz</a>      
        <a href="user/edit/{{$lesson->id}}" class="btn btn-secondary btn-sm">Edit</a>      
        <a href="user/delete/{{$lesson->id}}" class="btn btn-danger btn-sm">Delete</a>
      </td>
    </tr>
@endforeach
  </tbody>
</table>
@endsection('content')