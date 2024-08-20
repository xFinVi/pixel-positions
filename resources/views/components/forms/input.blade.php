@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => ' bg-white/10  px-5 py-4 w-3/4',
        'value' => old($name),
    ];
@endphp

<x-forms.field :$label :$name>
    <input
        class="w-full p-2 font-semibold text-gray-900  rounded-xl  focus:outline-none focus:ring-2 focus:ring-[#219ebc] focus:border-[#219ebc]"
        {{ $attributes($defaults) }}>
</x-forms.field>
