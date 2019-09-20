@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col-md-9">
            <h1>
                {{isset($lesson) ? "Edit Lesson" : "Add Lesson"}}
            </h1>
            <form class="form-prevent-multiple-submits"
                action={{ isset($lesson) ? "/user/updateLesson/".$lesson->id : "/user/storeLesson/".Auth::user()->id}}
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title" class="col-sm-2 col-form-label"><h4 style="letter-spacing: 0.5px;">Title</h4></label>
                        <input type="text" 
                               required="required" 
                               class="form-control" 
                               id="title" 
                               name="title" 
                               placeholder=""
                               value="{{isset($lesson) ? $lesson->title : ''}}">
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 col-form-label"><h4 style="letter-spacing: 0.5px;">Description</h4></label>
                        <input 
                            type="text" 
                            required="required"
                            class="form-control" 
                            id="description" 
                            name="description" 
                            placeholder=""
                            value="{{isset($lesson) ? $lesson->description : ''}}">
                </div>
                @if(isset($lesson))
                    <div class="py-4">
                        <input type="file" name="image" style="width: 197px;">
                    </div>
                @endif
                <div class="form-group text-right pt-2">
                    <a href="/user/myLessons" class="btn mr-2 btn-secondary">Back</a>
                    <button type="submit" class="btn btn-primary btn-prevent-multiple-submits">{{isset($lesson) ? 'Update' : 'Create'}}</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('content')