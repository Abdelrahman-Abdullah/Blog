<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<head>
    <style>
        html{
            scroll-behavior: smooth;
        }
    </style>
</head>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">

            {{-- Check If the user Logged in --}}
            @auth
                {{-- True : Show Welcome Message With his name and logout button --}}
                <x-dropitems>
                    {{--Trigger--}}
                    <x-slot name="trigger">
                        <button class="text-xs font-bold uppercase">
                            Welcome, {{ auth()->user()->name }}!
                        </button>
                    </x-slot>
                    {{--Trigger--}}

                    {{--Links--}}
                    @admin
                        <x-item-to-drop href="/admin/post/create"
                                        :active="request()->is('admin/post/create') ? 'true' : ''"
                        >
                            New Post
                        </x-item-to-drop>
                        <x-item-to-drop href="/admin/posts"
                                        :active="request()->is('admin/posts') ? 'true' : ''"
                        >
                           All Posts
                        </x-item-to-drop>
                    @endadmin
                    <x-item-to-drop
                        href="#"
                        x-data="{}"
                        @click.prevent="document.querySelector('#logout').submit()"
                    >
                        Logout
                    </x-item-to-drop>
                    {{--Links--}}

                    <form class="ml-6 text-sm hover:text-red-500 text-blue-500 hidden"
                          id="logout"
                          method="POST"
                          action="/logout"

                    >
                         @csrf
                    </form>
                </x-dropitems>

                {{-- False : Show Login and Register buttons --}}
            @else
                <a href="/register" class="text-xs font-bold uppercase mx-4">Register</a>
                <a href="/login" class="text-xs font-bold uppercase mx-4">Login</a>
            @endauth

            <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-bold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
    </nav>

{{--    Content Here --}}
    {{$slot}}
{{--    Content Here !--}}

    <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="/newsletter" class="lg:flex text-sm">
                    @csrf
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>

                        <input id="email"
                               type="text"
                               placeholder="Your email address"
                               name="email"
                               value="{{old('email')}}"
                               class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                    </div>

                    <button type="submit"
                            id="newsletter"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Subscribe
                    </button>

                </form>

            </div>
            <div class="mt-2 text-red-500 text-sm">
                @error('email')
                <p class="">
                    {{$message}}
                </p>
                @enderror
            </div>
        </div>
    </footer>

    <x-flash/>
</section>
</body>
