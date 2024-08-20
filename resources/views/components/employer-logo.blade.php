<!-- resources/views/components/employer-logo.blade.php -->
@props(['employer', 'width' => 90])

@php

    $logoUrl = filter_var($employer->logo, FILTER_VALIDATE_URL) ? $employer->logo : asset('storage/' . $employer->logo);
@endphp

<img src="{{ $logoUrl }}" class="rounded-xl" alt="{{ $employer->name }}" width="{{ $width }}"
    style="max-width: 100%; height: auto;">
