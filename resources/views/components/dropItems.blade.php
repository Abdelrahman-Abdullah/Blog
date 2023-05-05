@props(['$trigger'])
<div
    x-data="{open : false}"
    @click.away="open = false"
    class="relative"
>
    {{--Trigger--}}
    <div @click="open = !open" @click.away="open = false">
        {{$trigger}}
    </div>

    {{-- Links--}}
    <div x-show="open" class="py-2 absolute bg-gray-100 w-full rounded-xl mt-1 z-50 max-h-52 overflow-auto" style="display: none">
        {{$slot}}
    </div>
</div>
