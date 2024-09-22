<x-layout>
    @push('css')
        <style>
            .activeTab {
                opacity: 0.6;
            }
        </style>
    @endpush
    <div class="container py-5">
        <div class="accordion" id="account">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Account Details
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show active" data-bs-parent="#account">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <h5>First name: <span class="fs-6 fw-light">{{ auth()->user()->first_name }}</span>
                                    </h5>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h5>Last name: <span class="fs-6 fw-light">{{ auth()->user()->last_name }}</span>
                                    </h5>
                                </div>
                                <div class="col-lg-4 col-md-6">
                                    <h5>Email: <span class="fs-6 fw-light">{{ auth()->user()->email }}</span></h5>
                                </div>
                            </div>
                            <a href="#">Reset password?</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Orders
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#account">
                    <div class="accordion-body">
                        <table x-show="activeTab == 'orders'" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Order Code</th>
                                    <th>Status</th>
                                    <th>Subtotal</th>
                                    <th>Shipping address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (auth()->user()->orders as $order)
                                    <tr>
                                        <td>{{ $order->code }}</td>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ $order->total }}</td>
                                        <td>{{ $order->shippingAddress->full_address }}</td>
                                        <td><a href="/account/orders/{{ $order->id }}">View order</a></td>
                                        @if (abs($order->created_at->diffInHours(now())) < 6)
                                            <td><a href="/account/orders/{{ $order->id }}/edit">Edit order</a></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Addresses
                    </button>
                </h2>
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#account">
                    <div class="accordion-body">
                        <strong>This is the third item's accordion body.</strong> It is hidden by default, until the
                        collapse plugin adds the appropriate classes that we use to style each element. These classes
                        control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                        modify any of this with custom CSS or overriding our default variables. It's also worth noting
                        that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                        does limit overflow.
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
