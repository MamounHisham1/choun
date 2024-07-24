@props(['label', 'name'])

@php
    $defaults = [
        'id' => $name,
        'name' => $name,
        'class' => 'form-select',
    ];
@endphp

<x-admin.forms.field :$label :$name>
    <select {{ $attributes($defaults) }} data-select2-selector="icon">
        {{ $slot }}
    </select>

</x-admin.forms.field>
