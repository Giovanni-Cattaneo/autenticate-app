@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>{{ $post->title }}</h1>
        <img src="{{ $post->cover_image }}" alt="">
        <p>{{ $post->content }}</p>

    </div>
@endsection
