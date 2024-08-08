<x-layout>
    @push('css')
        <style>
            .activeTab {
                opacity: 0.6;
            }
        </style>
    @endpush
    <div class="container py-5">
        {{-- <div class="d-flex gap-5" x-data="{ activeTab: 'details' }" x-init="activeTab = localStorage.getItem('activeTab') || 'details';
        $watch('activeTab', () => localStorage.setItem('activeTab', activeTab))">
            <div class="d-flex flex-column w-25" style="max-width: 10rem">
                <a href="javascript:void(0);" class="fs-6 p-3 bg-info bg-opacity-10 border border-info"
                    :class="activeTab == 'details' ? 'activeTab' : ''" x-on:click="activeTab = 'details'">Account
                    Details</a>
                <a href="javascript:void(0);" class="fs-6 p-3 bg-info bg-opacity-10 border border-info"
                    :class="activeTab == 'orders' ? 'activeTab' : ''" x-on:click="activeTab = 'orders'">Orders</a>
                <a href="javascript:void(0);" class="fs-6 p-3 bg-info bg-opacity-10 border border-info"
                    :class="activeTab == 'address' ? 'activeTab' : ''" x-on:click="activeTab = 'address'">Address</a>
                <a href="/logout" class="fs-6 p-3 bg-info bg-opacity-10 border border-info">Logout</a>
            </div>
            <div class="border p-2">
                <p x-show="activeTab == 'details'">
                    Account detailes.... Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate,
                    voluptatibus
                    soluta voluptas consequatur et labore architecto delectus sint est libero laboriosam quas beatae
                    aut
                    pariatur veniam doloremque commodi fugiat nisi.
                </p>
                <table x-show="activeTab == 'orders'" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Status</th>
                            <th>Quantity</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>hello</td>
                            <td>Pending</td>
                            <td>10</td>
                            <td>1990</td>
                        </tr>
                        <tr>
                            <td>hello</td>
                            <td>Pending</td>
                            <td>10</td>
                            <td>1990</td>
                        </tr>
                    </tbody>
                </table>
                <p x-show="activeTab == 'address'">
                    Address.... Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate, voluptatibus
                    soluta voluptas consequatur et labore architecto delectus sint est libero laboriosam quas beatae
                    aut
                    pariatur veniam doloremque commodi fugiat nisi.
                </p>
            </div>
        </div> --}}
        <div class="accordion" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Account Details
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <strong>This is the first item's accordion body.</strong> It is shown by default, until the
                        collapse plugin adds the appropriate classes that we use to style each element. These classes
                        control the overall appearance, as well as the showing and hiding via CSS transitions. You can
                        modify any of this with custom CSS or overriding our default variables. It's also worth noting
                        that just about any HTML can go within the <code>.accordion-body</code>, though the transition
                        does limit overflow.
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
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <table x-show="activeTab == 'orders'" class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Order Code</th>
                                    <th>Status</th>
                                    <th>Quantity</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#CH85181</td>
                                    <td>Pending</td>
                                    <td>10</td>
                                    <td>1990</td>
                                    <td><a href="/account/orders/">view order</a></td>
                                </tr>
                                <tr>
                                    <td>#CH5181</td>
                                    <td>Pending</td>
                                    <td>10</td>
                                    <td>1990</td>
                                </tr>
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
                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
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
