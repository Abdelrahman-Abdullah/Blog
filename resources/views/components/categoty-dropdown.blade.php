<x-dropItems>
    {{--Trigger--}}
    <x-slot name="trigger">
        <button class="py-2 pl-3 pr-9 text-sm font-semibold text-left w-fit lg:flex">
            {{-- Draw Arrow--}}
            <x-drop-arrow />
            {{-- Draw Arrow !--}}
            {{isset($currentCategory) ? $currentCategory->name : 'Categories'}}
        </button>
    </x-slot>
    {{--Trigger!--}}


    {{--Links--}}
    <x-item-to-drop
        href="/"
        :active="!$currentCategory"
    >
        All
    </x-item-to-drop>

    @foreach($categories as $category)
        <x-item-to-drop
            {{--
                * request()->except('category') => Get array of all the request input except category item
                    cause we Get It Before

                * Arr::query() => method converts the array into a query string
             --}}
            href="/?category={{$category->slug}}&{{Arr::query(request()->except('category' , 'page'))}}"
            :active="$category->is($currentCategory)"
        >
            {{$category->name}}
        </x-item-to-drop>
    @endforeach
    {{--links!--}}
</x-dropItems>
