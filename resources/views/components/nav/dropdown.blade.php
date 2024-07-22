@props(['name'])
<li class="nxl-item nxl-hasmenu">
    <x-nav.droplist {{ $attributes->merge([]) }}>{{ $name }}</x-nav.droplist>
    <ul class="nxl-submenu">
        {{ $slot }}
    </ul>
</li>