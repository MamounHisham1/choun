<x-admin.layout>
    <x-slot:header>Orders</x-slot:header>
    <x-slot:breadcrumb>
        <x-admin.active-link>Ordered By: {{ $order->user->first_name }}</x-admin.active-link>
    </x-slot:breadcrumb>

    <div class="container">
        <x-admin.forms.form method="POST" methodType="PATCH" action="/admin/orders/{{ $order->id }}">
            <div class="form-group mb-2">
                <x-admin.forms.select name="status" label="Status">
                    @foreach (App\OrderStatus::getStatuses() as $value => $name)
                        <x-admin.forms.option value="{{ $value }}"
                            default="{{ $order->status }}">{{ $name }}</x-admin.forms.option>
                    @endforeach
                </x-admin.forms.select>
            </div>
            <x-admin.forms.button>Save Changes</x-admin.forms.button>
        </x-admin.forms.form>
        <div class="d-flex flex-column mb-3 text-dark justify-content-center">
            <div class="px-4">
                <p class="fs-6 fw-bold">First Name: <span class="fw-normal">{{ $order->user->first_name }}</span></p>
            </div>
            <div class="px-4">
                <p class="fs-6 fw-bold">Last Name: <span class="fw-normal">{{ $order->user->last_name }}</span></p>
            </div>
            <div class="px-4">
                <p class="fs-6 fw-bold">Email: <span class="fw-normal">{{ $order->user->email }}</span></p>
            </div>
            <div class="px-4">
                <p class="fs-6 fw-bold">Phone: <span class="fw-normal">{{ $order->shippingAddress->phone }}</span></p>
            </div>
            <div class="px-4">
                <p class="fs-6 fw-bold">City: <span class="fw-normal">{{ $order->shippingAddress->city }}</span></p>
            </div>
            <div class="px-4">
                <p class="fs-6 fw-bold">Street: <span class="fw-normal">{{ $order->shippingAddress->street }}</span></p>
            </div>
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
