@props(['error' => false])

@if ($error)
    <p class="text-sm text-danger mt-1">{{ $errors->first() }}</p>
@endif