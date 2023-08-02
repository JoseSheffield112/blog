<x-layout title="Create Post">

    <x-setting heading="Publish a New Post">
        <x-panel class="max-w-sm mx-auto">
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf

                <x-form.input name="title" required/>

                <x-form.input name="slug" required />

                <x-form.input name="thumbnail" type="file" />

                <x-form.textarea name="excerpt" />

                <x-form.textarea name="body" />

                <form.field>
                    <x-form.label name="Category" />

                    <select name="category_id" id="category_id">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('category_id') == $category->id ? 'selected' : ''}} >{{ $category->name }}</option>
                        @endforeach
                    </select>

                    <x-form.error name="category" />
                </form.field>

                <x-form.button> Publish </x-form.button>
            </form>
        </x-panel>
    </x-setting>

</x-layout>
