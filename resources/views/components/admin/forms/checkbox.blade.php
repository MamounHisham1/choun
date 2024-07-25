@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'checkbox',
        'class' => "custom-control-input",
        'value' => 1,
        'name' => $name,
        'id' => $name
    ]
@endphp

<div class="custom-control custom-checkbox ms-1 my-3">
    <input {{ $attributes($defaults) }}>
    <label class="custom-control-label" for="{{ $name }}">{{ $label }}</label>
</div>