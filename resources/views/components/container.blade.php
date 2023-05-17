@props(['heading'])
<section {{$attributes(['class'=>'px-6 py-8'])}}>
    <div class="text-center">
        <h1 class="font-bold text-2xl">
            {{$heading}}
        </h1>
    </div>
    <main class="max-w-full mt-10 bg-gray-50 p-6 border border-gray-300 rounded-xl">
        {{$slot}}
    </main>


</section>
