<x-layout title="Edit Post">

    <x-setting :heading="'Edit Post: ' . $post->title" >
        <x-panel class="max-w-sm mx-auto">
            <form method="POST" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')

                <x-form.input name="title" :value="old('title', $post->title)"/>

                <x-form.input name="slug" :value="old('slug', $post->slug)"/>

                <div class="flex mt-6">
                    <div class="flex-1">
                        <x-form.input name="thumbnail" type="file" />
                    </div>

                    <img src="{{asset('storage/' . $post->thumbnail) }}" class="rounded-xl ml-6" width="100">
                </div>

                <x-form.textarea name="excerpt"> {{old('excerpt', $post->excerpt)}} </x-form.textarea>

                <x-form.textarea name="body"> {{old('body', $post->body)}} </x-form.textarea>

                <form.field>
                    <x-form.label name="Category" />

                    <select name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('category_id', $post->category_id) == $category->id ? 'selected' : ''}} >{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <x-form.error name="category" />
                </form.field>

                <x-form.button> Update </x-form.button>
            </form>
        </x-panel>
    </x-setting>

</x-layout>
