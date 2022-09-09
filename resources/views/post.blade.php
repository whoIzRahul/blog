<x-layout>
    <h1>{{ $post->title }}</h1>
    <h2>
        <a href="#">
            {{$post->category->name}}
        </a>
    </h2>
    <div>{!!$post->body!!}</div>
    <a href="/">Go back</a>
</x-layout>