@props(["active"=>false])
@php
    $classes = "block text-left text-sm leading:10 px-2 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white";
    if($active){
        $classes = $classes." bg-blue-500";
    } 
@endphp

<a {{$attributes(['class'=>$classes])}}>
    {{$slot}}
</a>