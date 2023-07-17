<x-layout>
    @slot('title')
        {{ $posts->first()->category->name }}
    @endslot
    <h1>{{ $posts->first()->category->name }}</h1>

    @foreach($posts as $post)
        <article>
            <h2><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h2>

            <p>{{ $post->excerpt }}</p>

            <br>
        </article>
    @endforeach
</x-layout>
