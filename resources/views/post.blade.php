<x-layout>
    @slot('title')
        {{ $post->title }}
    @endslot
    <article>
        <h1> {{ $post->title }}  </h1>

        <p>
            By : <a href="/authors/{{ $post->author->username }}">{{ $post->author->name}}</a>
        </p>

        <div>
            {{-- text with these exclamations is not being escaped - only use if you are in contorl of the data --}}
            {!! $post->body; !!}
        </div>

    </article>
</x-layout>



