<x-layout>
    @include('posts._header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if($posts->count())
            <x-grid-post :posts="$posts"/>
            {{$posts->links()}}
        @else
            <div class="text-center">
                No Posts Yet Try Later.
            </div>
        @endif

    </main>

</x-layout>
