<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)">
    <div class="alert alert-success" x-show="show">
        {{ $slot }}
    </div>
</div>
