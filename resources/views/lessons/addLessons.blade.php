@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-10">
            <h1>Add a Suggestion</h1>
            <form action="/user/storeLessons/{{Auth::user()->id}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="">
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="">
                </div>
                <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <a href="" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('content')