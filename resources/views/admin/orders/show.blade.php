<x-admin.layout>
    <x-slot:header>Orders</x-slot:header>
    <x-slot:breadcrumb>
        <x-admin.active-link>Ordered By: {{ $order->user->first_name }}</x-admin.active-link>
    </x-slot:breadcrumb>

    <div class="d-flex flex-column mb-3 text-dark">
        <x-admin.forms.select name="status" label="Status">
            @foreach (App\OrderStatus::getStatuses() as $value => $name)
                <x-admin.forms.option value="{{ $value }}"
                    default="{{ $order->status }}">{{ $name }}</x-admin.forms.option>
            @endforeach
        </x-admin.forms.select>
        <div class="px-4">
            <p class="fs-4 fw-bold">First Name: {{ $order->user->first_name }}</p>
        </div>
        <div class="px-4">
            <p class="fs-4 fw-bold">Last Name: {{ $order->user->last_name }}</p>
        </div>
        <div class="px-4">
            <p class="fs-4 fw-bold">Email: {{ $order->user->email }}</p>
        </div>
        <div class="px-4">
            <p class="fs-4 fw-bold">Phone: {{ $order->shippingAddress->phone }}</p>
        </div>
        <div class="px-4">
            <p class="fs-4 fw-bold">City: {{ $order->shippingAddress->city }}</p>
        </div>
        <div class="px-4">
            <p class="fs-4 fw-bold">Street: {{ $order->shippingAddress->street }}</p>
        </div>
    </div>

    <div class="card stretch stretch-full">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover" id="projectList">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderLines as $orderLine)
                            <tr class="single-item">
                                <td>{{ $orderLine->product->name }}</td>
                                <td>{{ $orderLine->product->price }}</td>
                                <td>{{ $orderLine->quantity }}</td>
                                <td>{{ $orderLine->quantity * $orderLine->product->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-admin.layout>
