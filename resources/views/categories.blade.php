@extends('layout')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <h1>{{ $category->name }}</h1>

    @foreach($category->posts->sortByDesc('id') as $post)
        <article>
            <h2><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h2>

            <p>{{ $post->excerpt }}</p>

            <br>
        </article>
    @endforeach
@endsection
