<x-layout>
    @slot('title')
        Login
    @endslot

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-250 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl"> Login! </h1>

            <form method="POST" action="/login" class="mt-10">
                @csrf

                @if($errors->any())
                    <p class="text-center text-xs mb-2"><b>There are some issues with your registration!</b></p>
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-center text-red-500 text-xs mb-1"> {{$error }} </li>
                        @endforeach
                    </ul>
                @endif

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                        Email
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="email"
                           name="email"
                           id="email"
                           value = "{{ old('email') }}"
                           required
                    >
                    @error('email')
                    <p class="text-red-500 text-center text-xs mt-1"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="username">
                        Password
                    </label>

                    <input class="border border-gray-400 p-2 w-full"
                           type="password"
                           name="password"
                           id="password"
                           required
                    >
                    @error('password')
                    <p class="text-red-500 text-center text-xs mt-1"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Submit
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>
