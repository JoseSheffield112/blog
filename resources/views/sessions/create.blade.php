<x-layout title="Login">

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
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

                    <x-form.input name="email" type="email" auto-complete="current-password" />
                    <x-form.input name="password" type="password" auto-complete="current-password" />

                    <x-form.button>Log in</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
