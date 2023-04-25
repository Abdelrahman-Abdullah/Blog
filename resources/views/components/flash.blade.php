@if(session()->has('success'))
    <div x-data="{show: true}"
         x-show="show"
         x-init="setTimeout( ()=> show = false , 2500)"
         class="bg-blue-500 bottom-3 fixed px-4 py-3 right-3 rounded-xl text-sm text-white"
    >
        {{session('success')}}
    </div>
@endif
