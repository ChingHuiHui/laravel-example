<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto rounded-xl p-6">
            <x-panel>
                <h1 class="text-center font-bold text-xl">Login!</h1>
                <form method="POST" action="/login" class="mt-10 space-y-6">
                    @csrf
                    <x-form.input name="email" type="email" autocomplete="username" />
                    <x-form.input name="password" type="password" autocomplete="new-password" />
                    <x-form.button class="button">Submit</x-form>

                        @if($errors->any())
                        <ul class="text-red-500 text-sm">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                        </div>
                </form>
            </x-panel>
        </main>
    </section>
</x-layout>
