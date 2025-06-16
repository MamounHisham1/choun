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
                                    <th>Products Inside</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
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
                                                    <img src="{{ asset($category->image) }}" alt=""
                                                        class="img-fluid">
                                                </div>
                                                <div>
                                                    <a href="/admin/categories/{{ $category->id }}"
                                                        class="text-truncate-1-line">{{ $category->name }}</a>
                                                    <p
                                                        class="fs-12 text-muted mt-2 text-truncate-1-line project-list-desc">
                                                        Lorem ipsum dolor sit amet.</p>
                                                    <div
                                                        class="project-list-action fs-12 d-flex align-items-center gap-3 mt-2">
                                                        <a href="javascript:void(0);">Start</a>
                                                        <span class="vr text-muted"></span>
                                                        <a href="/admin/categories/{{ $category->id }}/edit">Edit</a>
                                                        <span class="vr text-muted"></span>
                                                        <form method="POST"
                                                            action="/admin/categories/{{ $category->id }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="text-danger"
                                                                style="border: none; background-color: transparent">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $category->products->count() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $categories->render('vendor.pagination.mypagination') }}
</div>
