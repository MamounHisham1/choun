<x-layout>
    <x-table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderLines as $orderLine)
                <tr>
                    <th>{{ $orderLine->product->name }}</th>
                    <th>{{ Number::currency($orderLine->price) }}</th>
                    <th>
                        <div class="block-quantity">
                            <div class="box-form-cart">
                                <div class="form-cart detail-qty">
                                    <span class="minus"></span>
                                    <input class="qty-val form-control" id="qty" type="text"
                                        value="{{ $orderLine->quantity }}" min="1" />
                                    <span class="plus"></span>
                                </div>
                            </div>
                        </div>
                    </th>
                    <th>{{ Number::currency($orderLine->total) }}</th>
                    <th><button class="btn text-danger fw-bolder" id="deleteProduct"
                            data-line="{{ $orderLine->id }}">X</button></th>
                </tr>
            @endforeach
        </tbody>
    </x-table>
    @push('scripts')
        <script>
            $("#deleteProduct").click(function(e) {
                $.ajax({
                    type: "POST",
                    url: "/account/orders/" + $(this).data("line") + "/destroy",
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        $(this).closest('tr').remove();
                    }
                });
            });
        </script>
    @endpush
</x-layout>
