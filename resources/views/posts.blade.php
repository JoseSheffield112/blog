<x-layout>
    <x-slot name="title">
        All posts
    </x-slot>

    {{-- default slot --}}
    @foreach ($posts as $post)
        <article>
            <h1>
                <a href="/post/{{ $post->slug }}">
                    {{$post->title}}
                </a>
            </h1>

            <p>
                Category : <a href="/categories/{{ $post->category->slug }}"> {{ $post->category->name; }} </a>
                <br>
                By : <a href="/authors/{{ $post->author->username }}">{{ $post->author->name}}</a>
            </p>

            <div style="{{$loop-> even ? 'color: yellow' : ''}}">
                {{$post->excerpt}}
            </div>
        </article>
    @endforeach
</x-layout>
