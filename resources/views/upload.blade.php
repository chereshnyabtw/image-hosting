@extends('layouts.main')

@section('page_name', 'Upload')

@section('content')
<div class="container">
    <form method="POST" action="/upload" enctype="multipart/form-data">
        @csrf
        @foreach ($errors as $error)
            <div class="alert alert-danger mb-3" role="alert">
                {{$error}}
            </div>
        @endforeach
        <div class="mb-3">
            <label class="form-label" for="file_title">Title</label>
            <input class="form-control" id="file_title" name="file_title" required/>
        </div>
        <div class="mb-3">
            <label class="form-label" for="image">File</label>
            <input class="form-control" id="image" name="image" type="file" required/>
        </div>
        <button class="btn btn-primary" type="submit">Upload</button>
    </form>
</div>
@endsection
