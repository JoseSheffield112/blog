@extends('layout')

@section('title')
    {{ $post->title; }}
@endsection

@section('content')
    <article>
        <h1> {{ $post->title; }}  </h1>

        <p>
            <a href="#"> {{ $post->category->name; }} </a>
        </p>

        <div>
            {{-- text with these exclamations is not being escaped - only use if you are in contorl of the data --}}
            {!! $post->body; !!}
        </div>

    </article>

    <br>

    <button onclick="window.location.href = '/';"> Mainpage </button>
@endsection



