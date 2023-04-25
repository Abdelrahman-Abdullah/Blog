<x-main-card :post="$posts[0]"  />

<div class="lg:grid lg:grid-cols-6">
    @foreach($posts->skip(1) as $post)
        <x-secondary-card
            :post="$post"
            class="{{$loop->iteration <= 2 ? 'col-span-3' : 'col-span-2'}}"
        />
    @endforeach
</div>
