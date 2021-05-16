@extends('layouts.main')

@section('page_name', 'Image')

@section('content')
<div class="container text-center">
    <img src="{{$url}}"/>
    <h1>{{$title}}</h1>
    <p>Author - {{$author}}</p>
</div>
@endsection
