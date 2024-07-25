@props(['buttonName'])
@php
    $defaults = [
        'class' => 'btn dropdown-toggle',
        'type' => 'button',
        'data-bs-toggle' => 'dropdown',
    ];
@endphp

<div class="dropdown dropdown-sort">
    <button {{ $attributes($defaults) }}>{{ $buttonName }}</button>
    {{ $slot }}
</div>