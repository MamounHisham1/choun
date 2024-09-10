<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)">
    <div class="alert alert-success text-center font-bold" x-show="show">
        {{ $slot }}
    </div>
</div>