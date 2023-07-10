@extends('layout')

@section('title')
    All Posts
@endsection

@section('content')
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="post/{{ $post->slug }}">
                    {{$post->title}}
                </a>
            </h1>

            <div style="{{$loop-> even ? 'color: yellow' : ''}}">
                {{$post->excerpt}}
            </div>
        </article>
    @endforeach
@endsection
