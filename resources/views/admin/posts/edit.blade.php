<x-layout>
<x-container :heading="'Edit : '.$post->title" class="max-w-4xl mx-auto">
        <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="title" value="{{$post->title}}"/>
            <x-form.textarea name="body">
                {{$post->body}}
            </x-form.textarea>

            <div class="flex">
                <div class="flex-1 mr-6">
                    <x-form.input name="thumbnail" type="file" />
                </div>
                <div>
                    <img src="{{asset('storage/'.$post->thumbnail)}}" alt="" width="150" class="rounded-xl">
                </div>
            </div>
            <x-form.main-field >
                <x-form.label name="category"/>

                <x-form.select name="category_id">
                    @foreach(\App\Models\Category::all() as $category)
                        <option value="{{$category->id}}"
                            {{$category->id == $post->category_id ? 'selected' : ''}}
                        >
                            {{$category->name}}
                        </option>
                    @endforeach
                </x-form.select>

                <x-form.error name="category"/>
            </x-form.main-field >
            <x-form.main-field >
                <x-main-submit-button>
                    update
                </x-main-submit-button>
            </x-form.main-field >

        </form>
</x-container>
</x-layout>
