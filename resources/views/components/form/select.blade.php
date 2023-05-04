@props(['name'])
<select
    name="{{$name}}"
        id="{{$name}}"
        class="p-2 focus:ring border border-gray-400"
>
{{$slot}}
</select>
