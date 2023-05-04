@props(['name' , 'type' => 'text'])
<x-form.main-field >
    <x-form.label name="{{$name}}"/>
    <input
        class="border border-gray-400 p-2 w-full focus:ring focus:outline-none"
        type="{{$type}}"
        name="{{$name}}"
        id="{{$name}}"
        value="{{old($name)}}"
        required
    >
    <x-form.error name="{{$name}}"/>
</x-form.main-field>

