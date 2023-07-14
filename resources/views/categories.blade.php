@extends('layout')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <h1>{{ $category->name }}</h1>
    @foreach($category->posts as $post)

        <h2>{{ $post->title }}</h2>

        <p>{{ $post->excerpt }}</p>

        <br>
    @endforeach
@endsection
