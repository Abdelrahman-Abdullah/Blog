<x-layout>
    <section class="px-6 py-8">
        <div class="text-center">
            <h1 class="font-bold text-2xl">
                Publish Your Post Here!
            </h1>
        </div>
        <main class="max-w-lg mx-auto mt-10 bg-gray-50 p-6 border border-gray-300 rounded-xl">

            <form method="POST" action="/admin/post" enctype="multipart/form-data">
                @csrf
                <x-form.input name="title" />
                <x-form.textarea name="body" />
                <x-form.input name="thumbnail" type="file" />
                <x-form.main-field >
                    <x-form.label name="category"/>
                        <x-form.select name="category_id">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                        {{old('category_id') ? 'selected' : ''}}
                                >
                                    {{$category->name}}
                                </option>
                            @endforeach
                        </x-form.select>
                    <x-form.error name="category"/>
                </x-form.main-field >
                <x-form.main-field >
                    <x-main-submit-button>
                        Publish
                    </x-main-submit-button>
                </x-form.main-field >

            </form>

        </main>


    </section>
</x-layout>
