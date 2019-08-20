@extends('layouts.app')

@section('content')
<div class="container in-front">
    <div class="row d-flex justify-content-center">
        <div class="col-sm-10">
            <h1>
                {{isset($lesson) ? "Edit Suggestion".$lesson->id : "Add a Suggestion"}}
            </h1>
            <form 
                action={{ isset($lesson) ? "/user/updateLesson/".$lesson->id : "/user/storeLesson/".Auth::user()->id}}
                method="POST">
                @csrf
                <div class="form-group">
                    <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <input type="text" 
                               required 
                               class="form-control" 
                               id="title" 
                               name="title" 
                               placeholder=""
                               value={{isset($lesson) ? $lesson->title : ""}}>
                </div>
                <div class="form-group">
                    <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <input 
                            type="text" 
                            required 
                            class="form-control" 
                            id="description" 
                            name="description" 
                            placeholder=""
                            value={{isset($lesson) ? $lesson->description : ""}}>
                </div>
                <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">{{isset($lesson) ? 'Update' : 'Create'}}</button>
                        <a href="/home" class="btn btn-secondary">Back</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection('content')