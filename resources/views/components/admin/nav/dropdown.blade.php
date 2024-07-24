@props(['name'])
<li class="nxl-item nxl-hasmenu">
    <x-admin.nav.droplist {{ $attributes->merge([]) }}>{{ $name }}</x-admin.nav.droplist>
    <ul class="nxl-submenu">
        {{ $slot }}
    </ul>
</li>