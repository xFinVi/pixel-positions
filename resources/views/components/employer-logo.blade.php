<!-- resources/views/components/employer-logo.blade.php -->
@props(['employer', 'width' => 90])

<img src="{{ $employer->logo }}" class="rounded-xl" alt="{{ $employer->name }}" width="{{ $width }}"
    style="max-width: 100%; height: auto;">
