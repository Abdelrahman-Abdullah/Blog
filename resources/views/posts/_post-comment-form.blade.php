<form method="POST" action="/posts/{{$post->title}}/comments"
      class="border border-gray-400 bg-gray-50 p-6 rounded-xl">
    @csrf
    <header class="flex items-center ">
        <img src="https://i.pravatar.cc/?u={{auth()->id()}}" alt="" width="60" class="rounded-xl">
        <h3 class="ml-4 text-semibold">
            Leave a comment ...
        </h3>
    </header>
    <div class="mt-4">
        <textarea class="w-full p-4 focus:outline-none text-xs focus:ring"
                  rows="5"
                  placeholder="What are you thinking?"
                  name="body"
                  required
         ></textarea>
        @error('body')
            <p class="mt-1.5 text-red-500 text-sm">
                {{$message}}
            </p>
        @enderror
    </div>

    <div class="flex justify-end mt-2">
        <x-main-submit-button>
            Post
        </x-main-submit-button>
    </div>
</form>
