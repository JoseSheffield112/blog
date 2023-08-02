<x-layout>
    @slot('title')
        Register
    @endslot

    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10">
            <x-panel>
                <h1 class="text-center font-bold text-xl"> Register! </h1>

                <form method="POST" action="/register" class="mt-10">
                    @csrf

                    @if($errors->any())
                        <p class="text-center text-xs mb-2"><b>There are some issues with your registration!</b></p>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-center text-red-500 text-xs mb-1"> {{$error }} </li>
                            @endforeach
                        </ul>
                    @endif

                    <x-form.input name="Name" type="text" />
                    <x-form.input name="Username" type="text" />
                    <x-form.input name="Email" type="email" autocomplete="new-username"/>
                    <x-form.input name="Password" type="password" autocomplete="new-password"/>

                    <x-form.button>Submit</x-form.button>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
