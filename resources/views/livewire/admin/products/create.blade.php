<div>
    <x-admin.forms.layout>
        <x-admin.forms.form action="/admin/products" method="POST">

            <x-admin.forms.input label="Product Name" name="name" placeholder="Laptop" required />
            <x-admin.forms.input label="Product Decription" name="description"
                placeholder="Lenovo is one of the best laptops compnaies..." required />
            <x-admin.forms.input type="number" label="Product Price" name="price" value="10" required />
            <x-admin.forms.input type="number" label="Product Quantity" name="quantity" value="1" required />

            <x-admin.forms.select label="Product Category" name="category_id">
                @foreach ($categories as $category)
                    <x-admin.forms.option value="{{ $category->id }}">{{ $category->name }}</x-admin.forms.option>
                @endforeach
            </x-admin.forms.select>

            <x-admin.forms.select label="Product Tags" name="tags">
                <x-admin.forms.option value="electorincs">Fun</x-admin.forms.option>
                <x-admin.forms.option value="electorincs">Fun</x-admin.forms.option>
            </x-admin.forms.select>

            <x-admin.forms.input type="file" label="Product Images" name="images[]" id="images" class="form-file"
                multiple required />

            <div class="d-flex justify-content-end gap-2 mt-3">
                <x-admin.forms.button>Save</x-admin.forms.button>
            </div>
        </x-admin.forms.form>
    </x-admin.forms.layout>
</div>
