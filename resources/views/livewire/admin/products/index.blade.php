<div>
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-2">
                <input type="number" class="form-control" wire:model.lazy="perPage" />
            </div>
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
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
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
                                                    <img src="{{ asset($product->image->name) }}" alt=""
                                                        class="img-fluid">
                                                </div>
                                                <div>
                                                    <a href="projects-view.html"
                                                        class="text-truncate-1-line">{{ $product->name }}</a>
                                                    <p
                                                        class="fs-12 text-muted mt-2 text-truncate-1-line project-list-desc">
                                                        {{ $product->description }}</p>
                                                    <div
                                                        class="project-list-action fs-12 d-flex align-items-center gap-3 mt-2">
                                                        <a href="javascript:void(0);">Start</a>
                                                        <span class="vr text-muted"></span>
                                                        <a href="/admin/products/{{ $product->id }}/edit">Edit</a>
                                                        <span class="vr text-muted"></span>
                                                        <form method="POST"
                                                            action="/admin/products/{{ $product->id }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="text-danger"
                                                                style="border: none; background-color: transparent">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>${{ $product->price }}</td>
                                        <td>{{ $product->quantity }}</td>
                                        <td>{{ $product->category->name }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $products->render('vendor.pagination.bootstrap-5') }}
</div>
