@props(['post'])
<article
            class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
            <div class="py-6 px-5 lg:flex">
                <div class="flex-1 lg:mr-8">
                    <img src="/images/illustration-1.png" alt="Blog Post illustration" class="rounded-xl">
                </div>

                <div class="flex-1 flex flex-col justify-between">
                    <header class="mt-8 lg:mt-0">
                        <x-categories-button :category="$post->category"/>

                        <div class="mt-4">
                            <h1 class="text-3xl">
                                <a href="post/{{$post->slug}}">{{$post->title}}</a>
                            </h1>

                            <span class="mt-2 block text-gray-400 text-xs">
                                    Published <time>{{$post->created_at->diffForHumans()}}</time>
                                </span>
                        </div>
                    </header>

                    <div class="text-sm mt-2 space-y-2">
                        {!! (request()->routeIs('post')) ? $post->body : $post->excerpt !!}
                    </div>

                    <footer class="flex justify-between items-center mt-8">
                        <div class="flex items-center text-sm">
                            <img src="/images/lary-avatar.svg" alt="Lary avatar">
                            <div class="ml-3">
                                <h5 class="font-bold"><a href="?author={{$post->author->username}}">{{$post->author->name}}</a></h5>
                                <h6>Mascot at Laracasts</h6>
                            </div>
                        </div>

                        <div class="hidden lg:block">
                            <a href="/post/{{$post->slug}}"
                               class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                            >Read More</a>
                        </div>
                    </footer>
                    @if(Route::is('post'))
                        @auth
                            <div class="border border-gray-500 mt-8 p-6 rounded-xl">
                                <form action="/post/{{$post->slug}}/comment" method="post">
                                    @csrf
                                        <header class="flex items-center">
                                            <img class="rounded-full" src="https:\\i.pravatar.cc/40?u={{auth()->id()}}" alt="" width="40" height="40">
                                            <h2 class="ml-4">Comment what's on your mind!</h2>
                                        </header>
                                        <div class="mt-6">
                                            <textarea class="w-full focus:outline-none focus:ring text-sm" name="body" id="body" rows="5"></textarea>
                                        </div>
                                        <div class=" flex justify-end ">
                                            <button class="bg-blue-500 px-8 py-3 mt-5 text-white font-semibold uppercase rounded-2xl text-sm" type="submit">Add Comment</button>
                                        </div>
                                </form>
                            </div>
                        @else
                            <div class="flex mt-5 ml-5">
                                <a href="/register" class="hover:underline hover:text-blue-300">Register </a><p class="mx-2"> or/and </p><a href="/login" class="hover:underline hover:text-blue-300 mr-2">log in </a> to comment.
                            </div>
                        @endauth
                        <section class=" mt-2">
                            @foreach($post->comments as $comment)
                                <x-post-comment :comment="$comment"/>
                            @endforeach    
                        </section>
                    @endif
                </div>
            </div>
            
            
        </article>

        