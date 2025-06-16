<x-layout>
    @push('css')
        <style>
            .account-tab-nav {
                border-bottom: 1px solid #EEEEEE;
                margin-bottom: 40px;
            }
            
            .account-tab-nav ul {
                display: flex;
                list-style: none;
                padding: 0;
                margin: 0;
            }
            
            .account-tab-nav li {
                margin-right: 40px;
            }
            
            .account-tab-nav a {
                display: block;
                padding: 16px 0;
                font-size: 17px;
                font-weight: 500;
                color: #999999;
                text-decoration: none;
                border-bottom: 2px solid transparent;
                transition: all 0.3s ease;
            }
            
            .account-tab-nav a.active,
            .account-tab-nav a:hover {
                color: #111111;
                border-bottom-color: #111111;
            }
            
            .account-info-card {
                background: #F9F9F9;
                border-radius: 8px;
                padding: 32px;
                margin-bottom: 24px;
            }
            
            .account-info-item {
                display: flex;
                align-items: center;
                padding: 16px 0;
                border-bottom: 1px solid #EEEEEE;
            }
            
            .account-info-item:last-child {
                border-bottom: none;
            }
            
            .account-info-label {
                font-size: 17px;
                font-weight: 500;
                color: #111111;
                min-width: 120px;
                margin-right: 24px;
            }
            
            .account-info-value {
                font-size: 16px;
                color: #555555;
                flex: 1;
            }
            
            .order-card {
                border: 1px solid #EEEEEE;
                border-radius: 8px;
                padding: 24px;
                margin-bottom: 16px;
                transition: box-shadow 0.3s ease;
            }
            
            .order-card:hover {
                box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
            }
            
            .order-header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 16px;
                padding-bottom: 16px;
                border-bottom: 1px solid #EEEEEE;
            }
            
            .order-status {
                padding: 4px 12px;
                border-radius: 4px;
                font-size: 14px;
                font-weight: 500;
                text-transform: uppercase;
            }
            
            .status-pending {
                background: #FFF3CD;
                color: #856404;
            }
            
            .status-approved {
                background: #D1E7DD;
                color: #0F5132;
            }
            
            .status-canceled {
                background: #F8D7DA;
                color: #721C24;
            }
            
            .status-draft {
                background: #E2E3E5;
                color: #383D41;
            }
            
            .order-actions {
                display: flex;
                gap: 12px;
                margin-top: 16px;
            }
            
            .btn-sm {
                padding: 8px 16px;
                font-size: 14px;
                border-radius: 4px;
            }
            
            .address-card {
                background: #F9F9F9;
                border-radius: 8px;
                padding: 24px;
                margin-bottom: 16px;
            }
            
            .address-card h6 {
                margin-bottom: 16px;
                color: #111111;
            }
            
            .empty-state {
                text-align: center;
                padding: 60px 20px;
                color: #999999;
            }
            
            .empty-state svg {
                width: 64px;
                height: 64px;
                margin-bottom: 16px;
                opacity: 0.5;
            }
        </style>
    @endpush
    
    <div class="section block-breadcrumb">
        <div class="container">
            <div class="breadcrumbs">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="#">My Account</a></li>
                </ul>
            </div>
        </div>
    </div>
    
    <section class="section block-content-account">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="text-56-medium mb-40">My Account</h2>
                    
                    <div class="account-tab-nav" x-data="{ activeTab: localStorage.getItem('activeTab') || 'details' }">
                        <ul>
                            <li>
                                <a href="#" 
                                   x-on:click.prevent="activeTab = 'details'; localStorage.setItem('activeTab', 'details')"
                                   :class="activeTab === 'details' ? 'active' : ''">
                                    Account Details
                                </a>
                            </li>
                            <li>
                                <a href="#" 
                                   x-on:click.prevent="activeTab = 'orders'; localStorage.setItem('activeTab', 'orders')"
                                   :class="activeTab === 'orders' ? 'active' : ''">
                                    Orders
                                </a>
                            </li>
                            <li>
                                <a href="#" 
                                   x-on:click.prevent="activeTab = 'addresses'; localStorage.setItem('activeTab', 'addresses')"
                                   :class="activeTab === 'addresses' ? 'active' : ''">
                                    Addresses
                                </a>
                            </li>
                        </ul>
                        
                        <!-- Account Details Tab -->
                        <div x-show="activeTab === 'details'" x-transition>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="account-info-card">
                                        <h4 class="text-17-medium mb-24">Personal Information</h4>
                                        
                                        <div class="account-info-item">
                                            <div class="account-info-label">First Name:</div>
                                            <div class="account-info-value">{{ auth()->user()->first_name }}</div>
                                        </div>
                                        
                                        <div class="account-info-item">
                                            <div class="account-info-label">Last Name:</div>
                                            <div class="account-info-value">{{ auth()->user()->last_name }}</div>
                                        </div>
                                        
                                        <div class="account-info-item">
                                            <div class="account-info-label">Email:</div>
                                            <div class="account-info-value">{{ auth()->user()->email }}</div>
                                        </div>
                                        
                                        <div class="account-info-item">
                                            <div class="account-info-label">Member Since:</div>
                                            <div class="account-info-value">{{ auth()->user()->created_at->format('F d, Y') }}</div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex gap-3">
                                        <a href="#" class="btn btn-black">Edit Profile</a>
                                        <a href="#" class="btn btn-border">Change Password</a>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="account-info-card">
                                        <h4 class="text-17-medium mb-16">Quick Stats</h4>
                                        <div class="account-info-item">
                                            <div class="account-info-label">Total Orders:</div>
                                            <div class="account-info-value">{{ auth()->user()->orders->count() }}</div>
                                        </div>
                                        <div class="account-info-item">
                                            <div class="account-info-label">Total Spent:</div>
                                            <div class="account-info-value">{{ Number::currency(auth()->user()->orders->sum('total')) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Orders Tab -->
                        <div x-show="activeTab === 'orders'" x-transition>
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="text-17-medium mb-32">Order History</h4>
                                    
                                    @php
                                        $orders = auth()->user()->orders()->latest()->get();
                                    @endphp
                                    
                                    @if($orders->count() > 0)
                                        @foreach($orders as $order)
                                            <div class="order-card">
                                                <div class="order-header">
                                                    <div>
                                                        <h6 class="mb-8">
                                                            <a href="/account/orders/{{ $order->id }}" class="text-17-medium color-neutral-dark">
                                                                Order #{{ $order->code }}
                                                            </a>
                                                        </h6>
                                                        <p class="body-p2 neutral-medium-dark mb-0">
                                                            Placed on {{ $order->created_at->format('F d, Y \a\t g:i A') }}
                                                        </p>
                                                    </div>
                                                    <div class="text-right">
                                                        <span class="order-status status-{{ strtolower($order->status->name) }}">
                                                            {{ $order->status }}
                                                        </span>
                                                        <p class="text-17-medium mb-0 mt-8">{{ Number::currency($order->total) }}</p>
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <p class="body-p2 neutral-medium-dark">
                                                            <strong>Shipping Address:</strong><br>
                                                            {{ $order->shippingAddress->full_address }}
                                                        </p>
                                                        <p class="body-p2 neutral-medium-dark">
                                                            <strong>Items:</strong> {{ $order->orderLines->count() }} item(s)
                                                        </p>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="order-actions">
                                                            <a href="/account/orders/{{ $order->id }}" class="btn btn-border btn-sm">View Details</a>
                                                            @if($order->status == App\OrderStatus::Pending && abs($order->created_at->diffInHours(now())) < 6)
                                                                <a href="/account/orders/{{ $order->id }}/edit" class="btn btn-black btn-sm">Edit Order</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="empty-state">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                            </svg>
                                            <h5 class="neutral-medium-dark mb-16">No Orders Yet</h5>
                                            <p class="body-p2 neutral-medium-dark mb-24">You haven't placed any orders with us yet.</p>
                                            <a href="/shop" class="btn btn-black">Start Shopping</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <!-- Addresses Tab -->
                        <div x-show="activeTab === 'addresses'" x-transition>
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="text-17-medium mb-32">Saved Addresses</h4>
                                    
                                    @php
                                        $addresses = auth()->user()->shippingAddresses ?? collect();
                                    @endphp
                                    
                                    @if($addresses->count() > 0)
                                        <div class="row">
                                            @foreach($addresses as $address)
                                                <div class="col-md-6">
                                                    <div class="address-card">
                                                        <h6>Shipping Address {{ $loop->iteration }}</h6>
                                                        <p class="body-p2 neutral-medium-dark mb-8">
                                                            {{ $address->street }}<br>
                                                            @if($address->apartment)
                                                                {{ $address->apartment }}<br>
                                                            @endif
                                                            {{ $address->city }}<br>
                                                            {{ $address->phone }}
                                                        </p>
                                                        <div class="d-flex gap-2 mt-16">
                                                            <a href="#" class="btn btn-border btn-sm">Edit</a>
                                                            <a href="#" class="btn btn-outline-danger btn-sm">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <a href="#" class="btn btn-black">Add New Address</a>
                                    @else
                                        <div class="empty-state">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            <h5 class="neutral-medium-dark mb-16">No Saved Addresses</h5>
                                            <p class="body-p2 neutral-medium-dark mb-24">Add your shipping addresses for faster checkout.</p>
                                            <a href="#" class="btn btn-black">Add Address</a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
