<x-layout>
    @push('css')
        <style>
            .activeTab {
                opacity: 0.6;
            }
        </style>
    @endpush
    <div class="container py-5">
        <div class="d-flex gap-5" x-data="{ activeTab: 'details' }" x-init="activeTab = localStorage.getItem('activeTab') || 'details';
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
        </div>
    </div>
</x-layout>
