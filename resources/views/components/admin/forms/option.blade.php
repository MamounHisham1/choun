@props([
    'default' => '',
]);

<option {{ $attributes->merge([]) }} @selected($default == $attributes['value'])>{{ $slot }}</option>
