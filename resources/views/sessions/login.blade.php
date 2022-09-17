<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10  bg-gray-100 border border-gray-300 p-6 rounded-xl">
            <h1 class="font-bold text-center my-5">Log In!</h1>
            <form action="/session" method="post">
            @csrf
                <div class="mb-6">
                    <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Email
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded"
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email')}}"
                    required
                    >
                    @error('email')
                        <div class="text-red-500 text-xs">{{ $message  }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                        Password
                    </label>
                    <input class="border border-gray-400 p-2 w-full rounded"
                    type="password"
                    name="password"
                    id="password"
                    required
                    >
                    @error('password')
                        <div class="text-red-500 text-xs">{{ $message  }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Log In
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layout>    