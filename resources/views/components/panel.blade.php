@php
    $classes = "p-4 bg-white/5 rounded-xl flex border border-transparent cursor-pointer transition-colors duration-300 hover:border-blue-800 group"
@endphp

<div {{ $attributes->merge(['class' => $classes])}}>
    {{ $slot }}
</div>