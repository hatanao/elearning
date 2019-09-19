@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 m-auto">
            <form class="form-prevent-multiple-submits" method="post" action="/admin/store/admin" enctype="multipart/form-data">
            @csrf
            <div class="avatar text-center">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
                <img src="{{ Auth::user()->avatar }}" class="rounded-circle" style="width: 10vw; height: 10vw;">
                <div class="py-4">
                    <input type="file" name="image" style="width: 197px;">
                </div>
            </div>
            <div class="form-group" >
                <label for="name">Name</label>
                <input type="name" class="form form-control" id="name" value="" name="name">
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form form-control" id="email" value="" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form form-control" id="password" name="password">
            </div>
            <div class="text-center py-2">
                <input type="submit" class="btn btn-primary btn-prevent-multiple-submits">
            </div>
            </form>
        </div>
    </div>
</div>
@endsection