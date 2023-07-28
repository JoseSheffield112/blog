@auth
    <x-panel>
        <form method="POST" action="/post/{{$post->slug}}/comments" >
            @csrf
            <header class="flex items-center">
                <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="40" height="40" class="rounded-full">

                <h2 class="ml-4"> Wanna leave a comment?</h2>
            </header>

            <div class="mt-6" style="border: 4mm ridge rgba(0, 191, 255, .6); ">
                <textarea name="body" class="w-full text-sm focus:outline-none focus-ring" rows="5" placeholder="Here is where you type" style="resize: none" required></textarea>

                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <x-primary-button :attributes="bg-blue-500">Post</x-primary-button>
        </form>
    </x-panel>
@else
    <p> please login to post a comment</p>
@endauth
