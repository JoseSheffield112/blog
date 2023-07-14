@extends('layout')

@section('title')
    All Posts
@endsection

@section('content')
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/post/{{ $post->slug }}">
                    {{$post->title}}
                </a>
            </h1>

            <p>
                Category : <a href="/categories/{{ $post->category->id }}"> {{ $post->category->name; }} </a>
                <br>
                User : {{ $post->user->name}}
            </p>

            <div style="{{$loop-> even ? 'color: yellow' : ''}}">
                {{$post->excerpt}}
            </div>
        </article>
    @endforeach
@endsection
