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
                                        @error('body')
                                            <div class="text-red-500 text-xs">
                                                {{$message}}
                                            </div>
                                        @enderror
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