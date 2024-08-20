@props(['label', 'name'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' =>
            'rounded-xl px-5 py-2.5 w-full text-gray-900 font-semibold  placeholder-[#bde0fe] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500',
    ];
@endphp

<x-forms.field :$label :$name>
    <select {{ $attributes($defaults) }} class="bg-[#fcbf49] text-[#001219]">
        {{ $slot }}
    </select>
</x-forms.field>
