@props(['href', 'text', 'isActive' => false, 'attributes' => []])

<a href="{{ $href }}"
    class="px-3 py-2 text-sm font-medium {{ $isActive ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md"
    aria-current="{{ $isActive ? 'page' : '' }}" {{ $attributes->merge(['class' => '']) }}>
    {{ $slot }}
</a>
