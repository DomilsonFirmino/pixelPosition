@props(['tag','size'=> 'base'])

@php
    $classes = "bg-white/10 hover:bg-white/25 transition-colors duration-300 ";
    if($size == "base"){
        $classes .= "px-4 py-1 text-lg rounded-2xl";

    }

    if($size == "small"){
        $classes .= "px-3 py-1 text-xs rounded-xl";
    }
@endphp

<a href="/tags/{{strtolower($tag->name)}}" class="{{ $classes }}" >{{ $tag->name }}</a>
