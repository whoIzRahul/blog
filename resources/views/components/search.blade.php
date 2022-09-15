<div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
    <form method="GET" action="?{{request()->getQueryString()}}">
        @if(request('category'))
            <input type="hidden" name="category" value="{{request('category')}}">
        @endif
        @if(request('author'))
        <input type="hidden" name="author" value="{{request('author')}}">
        @endif
        <input type="text" name="search" placeholder="Find something"
               class="bg-transparent placeholder-black font-semibold text-sm" value={{request('search')}}>
    </form>
</div>