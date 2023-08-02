<x-layout title="{{ $posts->first()->author->name }}">

    @foreach($posts as $post)

        <article>

            <h1> {{ $post->title }} </h1>

            <br>

            <p> A post by {{ $post->author->name }} </p>

            <br>

            <p> Category : {{ $post->category->name }} </p>

            <br>

            <p> {{ $post->body }} </p>

            <br id="spacing">

        </article>

    @endforeach
</x-layout>
