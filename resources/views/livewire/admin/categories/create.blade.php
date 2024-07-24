<div>
    <x-admin.forms.layout>
        <x-admin.forms.form action="/admin/categories" method="POST">

            <x-admin.forms.input label="Category Name" name="name" placeholder="Gaming" required />
            <x-admin.forms.input type="file" label="Category Image" name="image" id="image" class="form-file" required />

            <div class="d-flex justify-content-end gap-2 mt-3">
                <x-admin.forms.button>Save</x-admin.forms.button>
            </div>
        </x-admin.forms.form>
    </x-admin.forms.layout>
</div>
