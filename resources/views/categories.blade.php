<x-layout>
    <x-layout name="title">
        {{ $posts->category->name }}
    </x-layout>
    <h1>{{ $posts->category->name }}</h1>

    @foreach($posts as $post)
        <article>
            <h2><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h2>

            <p>{{ $post->excerpt }}</p>

            <br>
        </article>
    @endforeach
</x-layout>
