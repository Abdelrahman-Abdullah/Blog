@props(['name'])

<x-form.main-field >
    <x-form.label name="{{$name}}"/>
    <textarea
        class="w-full border border-gray-400 focus:ring  focus:outline-none"
        rows="7"
        name="{{$name}}"
    >
        {{$slot}}
    </textarea>
    <x-form.error name="{{$name}}"/>

</x-form.main-field >
