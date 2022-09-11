<x-layout>
    {{-- @foreach ($posts as $post)
    <article>
        <h1>
            <a href="/post/{{$post->slug}}">
                {{$post->title}}
            </a>
        </h1>
        <p>By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>
        <div>
            {!! $post->excerpt !!} 
        </div>
    </article>
    @endforeach --}}

    @include('_posts-header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        {{-- Passing the post collection to the existing component called post grid --}}
        <x-post-grid :posts="$posts"/>
    </main>



</x-layout>