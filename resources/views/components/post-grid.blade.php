@props(['posts'])
@if($posts->count())
        {{-- importing the codes of featured-post-card from the layouts folder --}}
        @if($posts->count() == 1)
            <x-featured-post-card :post="$posts[0]"/>
        @elseif($posts->count() == 2)
            <div class="lg:grid lg:grid-cols-4">
                @foreach($posts as $post)
                {{-- importing the codes of post-card from the layouts folder --}}
                    <x-post-card :post="$post" class="col-span-2"/>
                @endforeach
            </div>
        @else
            <x-featured-post-card :post="$posts[0]"/>
                <div class="lg:grid lg:grid-cols-6">
                    @foreach($posts->skip(1) as $post)
                    {{-- importing the codes of post-card from the layouts folder --}}
                        <x-post-card :post="$post" class="{{$loop->iteration > 2 ? 'col-span-2' : 'col-span-3'}}"/>
                    @endforeach
                </div>
        @endif
@else
    <p class="text-center">There are no posts yet. Please check later!!</p>
@endif