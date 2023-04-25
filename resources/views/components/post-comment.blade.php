
<article class="flex bg-gray-50 p-4 rounded-xl border border-gray-300 ">
    <div class="flex-shrink-0 mr-5">
        <img src="https://i.pravatar.cc/?u={{$comment->user_id}}" alt="" width="60" class="rounded-xl">
    </div>
    <div>
        <header class="mb-4">
            <h3>
                <strong>
                    {{$comment->author->name}}
                </strong>
            </h3>
            <p class="text-xs">
                Posted
                <time>
                    {{$comment->created_at->diffForHumans()}}
                </time>
            </p>
        </header>
        <p>
            {{$comment->body}}
        </p>
    </div>
</article>
