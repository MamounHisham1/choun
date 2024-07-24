@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'form-control',
        'value' => old($name),
        'rows' => '3',
    ];
@endphp

<x-admin.forms.field :$label :$name>
    <textarea {{ $attributes($defaults) }}></textarea>
</x-admin.forms.field>
