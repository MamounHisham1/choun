@props(['name', ''])
@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'form-control',
        'value' => old($name)
    ];
@endphp

<x-forms.field :$name>
    <input {{ $attributes($defaults) }}>
</x-forms.field>