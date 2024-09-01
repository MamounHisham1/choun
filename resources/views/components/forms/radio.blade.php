<label class="radio-badge">
    <input {{ $attributes(['type' => "radio", 'name' => "options", 'value' => "option1"]) }}>
    <span class="badge-content">{{ $slot }}</span>
</label>

{{-- TODO: icon on the attributes --}}
{{-- <i class="badge-icon bi bi-star-fill"></i> --}}