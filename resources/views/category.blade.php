<x-layout>
    <h1>{{ $category->name }}</h1>
    @foreach($category->posts as $post)
    <article>
        <h2>{{$post->title}}</h2>
        <div>{!!$post->body!!}</div>
    </article>
    @endforeach
    <a href="/">Go back</a>
</x-layout>