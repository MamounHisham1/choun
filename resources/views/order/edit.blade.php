<x-layout>
    <x-forms.form method="POST" action="/account/orders/{{ $order->id }}/update">
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
                                            name="orderLines[{{ $orderLine->id }}]" value="{{ $orderLine->quantity }}"
                                            min="1" />
                                        <span class="plus"></span>
                                    </div>
                                </div>
                            </div>
                        </th>
                        <th>{{ Number::currency($orderLine->total) }}</th>
                        <th><button type="button" class="btn text-danger fw-bolder delete-product"
                                data-line="{{ $orderLine->id }}">X</button></th>
                    </tr>
                @endforeach
            </tbody>
        </x-table>
        <div class="container">
            <button type="submit" class="btn btn-primary mb-3" id="delete-order" style="padding: 0.375rem 0.75rem;">Save changes</button>
            <button type="button" class="btn btn-danger mb-3" id="delete-order" style="padding: 0.375rem 0.75rem;"
                date-order="{{ $order->id }}">Delete Order</button>
        </div>
    </x-forms.form>


    @push('scripts')
        <script>
            $("#delete-order").click(function(e) {
                $.ajax({
                    type: "POST",
                    url: "/account/orders/" + $(this).data("order") + "/destroy",
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(response) {}
                });
            })

            $(".delete-product").click(function(e) {
                $.ajax({
                    type: "POST",
                    url: "/account/orders/item/" + $(this).data("line") + "/destroy",
                    data: {
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response) {}
                });
                $(this).closest('tr').fadeOut(500, function() {
                    $(this).remove();
                });
            });
        </script>
    @endpush
</x-layout>
