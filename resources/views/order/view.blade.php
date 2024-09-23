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
                    <th>{{ $orderLine->price }}</th>
                    <th>{{ $orderLine->quantity }}</th>
                    <th>{{ $orderLine->total }}</th>
                </tr>
            @endforeach
        </tbody>
    </x-table>
</x-layout>
