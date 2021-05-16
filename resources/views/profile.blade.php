@extends('layouts.main')

@section('page_name', 'Profile')

@section('content')
<div class="container text-center">
    <table class="table">
        <thead>
            <tr>
              <th scope="col">Title</th>
              <th scope="col">URL</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($images as $image)
                <tr>
                    <td>{{$image->title}}</td>
                    <td><a href="image/{{$image->id}}">image/{{$image->id}}</a></td>
                </tr>
            @endforeach
          </tbody>
    </table>
</div>
@endsection
