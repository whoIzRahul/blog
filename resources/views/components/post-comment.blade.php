@props(['comment'])
<article class="bg-gray-100 rounded-xl hover:bg-gray-200">
        <div class="flex my-6  space-x-4 px-10 space-y-3 pb-3">
            <div class="flex-shrink-0 pt-3">
                <img src="https:\\i.pravatar.cc?u={{$comment->id}}" width="40" height="40" alt="" class="rounded-xl">
            </div>
            <div>
                <header>
                    <h3 class="font-bold">{{$comment->author->name}}</h3>
                    <p class="text-xs mb-2">Posted <time>{{$comment->created_at->diffForHumans()}}</time></p>
                    <p class = "text-sm">{{$comment->body}}</p>
                </header>
            </div>
        </div>
    </article>