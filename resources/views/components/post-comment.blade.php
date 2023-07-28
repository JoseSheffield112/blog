@props(['comment'])

<x-panel class="bg-gray-100">
    <article class="flex bg-gray-100 space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/60?u= {{$comment->id}}" alt="" width="60" height="60">
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{$comment->author->name}}</h3>

                <p class="text-cs">
                    Posted <time>{{ $comment->created_at->format("jS F, Y, g:i a") }}</time>
                </p>
            </header>
            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>
