@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'form-control',
        'value' => old($name)
    ];
@endphp

<x-admin.forms.field :$name>
    <input {{ $attributes($defaults) }}>
</x-admin.forms.field>