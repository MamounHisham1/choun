@php
    $defaults = [
        'class' => "position-absolute top-0 start-0 w-100",
        'style' => "height: 200px; object-fit: cover;"
    ]
@endphp

<img {{ $attributes($defaults) }}>