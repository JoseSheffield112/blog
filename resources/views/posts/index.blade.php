<x-layout title="All posts">

    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if($posts->count())
            <x-posts-grid :posts="$posts"/>

            {{ $posts->links() }}
        @else
            <p clas="text-center">
                There are no posts! Please check back later.
            </p>
        @endif
    </main>
</x-layout>
