@extends('layouts.app')

<!-- @section('css')
<link href="{{ asset('css/showLessons.css') }}" rel="stylesheet">
@endsection -->

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="question col-md-6">
            <input type="text" name="" value="" placeholder="">
        </div>

        <div class="choices col-md-6">
            <button type="button" class="btn btn-primary btn-lg btn-block">Block level button</button>
            <button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button>
            <button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button>
            <button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button>
        </div>
    </div>
</div>

@endsection('content')
