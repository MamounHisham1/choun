<form {{ $attributes(['method' => 'GET']) }} enctype="multipart/form-data">
    @if ($attributes->get('method', 'GET') !== 'GET')
        @csrf
        @method($attributes->get('method'))
    @endif
    <div class="card stretch stretch-full">
        <div class="card-body">
            {{ $slot }}
        </div>
    </div>
</form>
