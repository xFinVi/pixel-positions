@php
    $classes =
        'p-4 bg-white/5 rounded-xl  border border-transparent hover:border-blue-400 group transition-all duration-100';
@endphp

<div {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</div>
