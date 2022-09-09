<x-layout>
    @foreach ($posts as $post)
    <article>
        <h1>
            <a href="/post/{{$post->slug}}">
                {{$post->title}}
            </a>
        </h1>

        <h2>
            <a href="#">
                {{$post->category->name}}
            </a>
        </h2>

        <div>
            {{ $post->excerpt }} 
        </div>
    </article>
    @endforeach
</x-layout>