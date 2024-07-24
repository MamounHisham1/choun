@props(['name'])
<div {{ $attributes(['class' => 'form-group']) }}>
    {{ $slot }}

    <x-forms.error :error="$errors->first($name)" />
</div>

