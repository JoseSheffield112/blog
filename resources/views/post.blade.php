@extends('layout')

@section('title')
    {{ $post->title; }}
@endsection

@section('content')
    <article>
        <h1> {{ $post->title; }}  </h1>

        <div>
            {{-- text with these exclamations is not being escaped, but is handled as html--}}
            {!! $post->body; !!}
        </div>

    </article>

    <button onclick="window.location.href = '/';"> Go back to mainpage </button>
@endsection




