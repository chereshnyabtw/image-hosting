@extends('layouts.main')

@section('page_name', 'Register')

@section('content')
<div class="container">
    <form method="POST" action="/register">
        @csrf

        @foreach ($errors->all() as $error)
            <div class="alert alert-danger mb-3" role="alert">
                {{$error}}
            </div>
        @endforeach
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required/>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
@endsection
