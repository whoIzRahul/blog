<x-drop-down>
  <x-slot name="trigger">
      <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
          {{ isset($currentCategory) ? ucwords($currentCategory->name) : "Categories"}}
          <x-svg-icon name="dropdownarrow"/>
      </button>
  </x-slot>
  <x-dropdown-item href="/"
   {{--:active="request()->routeIs('home')" Use this if you want to show that all is active--}}
   >All</x-dropdown-item>
  @foreach($categories as $category)
  {{-- {{(isset($currentCategory) && $currentCategory->id == $category->id)  ? 'bg-blue-500' : ''}} --}}
  <x-dropdown-item href="?category={{$category->slug}}" :active="isset($currentCategory) && $currentCategory->id == $category->id">{{ucwords($category->name)}}</x-dropdown-item>
  @endforeach
</x-drop-down>