<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto bg-gray-100 border border-gray-200 rounded-xl p-6">
            <h1 class="text-center font-bold text-xl">Login!</h1>
            <form method="POST" action="/login" class="mt-10 space-y-6">
                @csrf
                <div>
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
                    <input class="border border-gray-400 p-2 w-full" type="teemailxt" name="email" id="email"
                        value="{{ old('email') }}" required>
                    @error('email')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
                    <input class="border border-gray-400 p-2 w-full" type="password" name="password" id="password"
                        required>
                    @error('password')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button type="submit"
                        class="bg-blue-400 text-white rounded py-2 px-5 hover:bg-blue-500">LOGIN</button>
                </div>
                @if($errors->any())
                <ul class="text-red-500 text-sm">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
                @endif
                </div>
            </form>
        </main>
    </section>
</x-layout>
