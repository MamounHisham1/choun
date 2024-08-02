<x-admin.layout>
    <x-slot:header>Orders</x-slot:header>
    <x-slot:breadcrumb>
        <x-admin.active-link></x-admin.active-link>
    </x-slot:breadcrumb>

    <div>
        <div class="row">
            <div class="col-lg-12">
                <x-admin.forms.form>
                    <div class="form-group mb-2">
                        <x-admin.forms.select name="status" label="Status">
                            <x-admin.forms.option value="">All</x-admin.forms.option>
                            <x-admin.forms.option value="pending">Pending</x-admin.forms.option>
                            <x-admin.forms.option value="approved">Approved</x-admin.forms.option>
                            <x-admin.forms.option value="shipped">Shipped</x-admin.forms.option>
                            <x-admin.forms.option value="arrived">Arrived</x-admin.forms.option>
                            <x-admin.forms.option value="canceled">Canceled</x-admin.forms.option>
                        </x-admin.forms.select>
                    </div>
                    <x-admin.forms.button>Filter</x-admin.forms.button>
                </x-admin.forms.form>
                <div class="card stretch stretch-full">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover" id="projectList">
                                <thead>
                                    <tr>
                                        <th class="wd-30">
                                            <div class="btn-group mb-1">
                                                <div class="custom-control custom-checkbox ms-1">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="checkAllProject">
                                                    <label class="custom-control-label" for="checkAllProject"></label>
                                                </div>
                                            </div>
                                        </th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th>Email</th>
                                        <th>Subtotal</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr class="single-item">
                                            <td>
                                                <div class="item-checkbox ms-1">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input checkbox"
                                                            id="checkBox_1">
                                                        <label class="custom-control-label" for="checkBox_1"></label>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="project-name-td">
                                                <div class="hstack gap-4">
                                                    <div class="avatar-image border-0">
                                                        <img src="" alt="" class="img-fluid">
                                                    </div>
                                                    <div>
                                                        <a href="projects-view.html"
                                                            class="text-truncate-1-line">{{ $order->user->full_name }}</a>
                                                        <p
                                                            class="fs-12 text-muted mt-2 text-truncate-1-line project-list-desc">
                                                            a
                                                        </p>
                                                        <div
                                                            class="project-list-action fs-12 d-flex align-items-center gap-3 mt-2">
                                                            <a href="javascript:void(0);">Start</a>
                                                            <span class="vr text-muted"></span>
                                                            <a href="/admin/products/k/edit">Edit</a>
                                                            <span class="vr text-muted"></span>
                                                            <form method="POST" action="/admin/products/k">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="text-danger"
                                                                    style="border: none; background-color: transparent">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><span
                                                    class="badge bg-soft-{{ $order->status->color() }} text-{{ $order->status->color() }}">{{ $order->status->name() }}</span>
                                            </td>
                                            <td>{{ $order->user->email }}</td>
                                            <td>{{ $order->orderLines()->sum('subtotal') }}</td>
                                            <td>{{ $order->shippingAddress->phone }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{ $orders->render('vendor.pagination.bootstrap-5') }}
    </div>


</x-admin.layout>
