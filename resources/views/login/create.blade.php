<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-50 p-6 border border-gray-300 rounded-xl">
            <h1 class="text-center font-bold text-xl text-blue-500">
                Login!
            </h1>

            <form method="POST" action="/login">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="email"
                    >
                        email
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="email"
                        name="email"
                        id="email"
                        value="{{old('email')}}"
                        required
                    >

                    @error('email')
                    <p class="text-red-400 text-xs mt-2">{{$message}}</p>
                    @enderror

                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="password"
                    >
                        password
                    </label>

                    <input
                        class="border border-gray-400 p-2 w-full"
                        type="password"
                        name="password"
                        id="password"
                        required
                    >

                    @error('password')
                    <p class="text-red-400 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-6">

                    <x-main-submit-button>
                        Login
                    </x-main-submit-button>

                </div>

            </form>

        </main>
    </section>
</x-layout>
