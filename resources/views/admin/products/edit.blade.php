<x-admin.layout>

    <x-slot:header>Products</x-slot:header>
    <x-slot:breadcrumb>
        <x-admin.active-link>Create</x-admin.active-link>
    </x-slot:breadcrumb>

    <x-admin.forms.layout>
        <x-admin.forms.form action="/admin/products/{{ $product->id }}" method="POST">
            @method('PUT')

            <x-admin.forms.input label="Product Name" name="name" value="{{ $product->name }}" required />
            <x-admin.forms.textarea label="Product Decription" name="description" value="{{ $product->description }}" required />
            <x-admin.forms.input type="number" label="Product Price" name="price" value="{{ $product->price }}" required />
            <x-admin.forms.input type="number" label="Product Quantity" name="quantity" value="{{ $product->quantity }}"
                required />

            <x-admin.forms.select label="Product Tags" name="tags">
                <x-admin.forms.option value="electorincs">Fun</x-admin.forms.option>
                <x-admin.forms.option value="electorincs">Fun</x-admin.forms.option>
            </x-forms.select>
            <div class="row">
                    <div class="image border-0 col-4 mb-4">
                        <img src="" alt="" class="img-fluid"
                            style="height: 150px; object-fit: cover;">
                    </div>
            </div>
            <x-admin.forms.input type="file" label="Product Images" name="images[]" id="images" class="form-file"
                multiple />


            <div class="d-flex justify-content-end gap-2 mt-3">
                <a href="/admin/products" class="btn btn-md btn-outline-danger">Cancel</a>
                <x-admin.forms.button>Save</x-admin.forms.button>
            </div>
        </x-forms.form>
    </x-forms.layout>

    <script>
        $(document).ready(function() {
            var i = 1;
            $("#add_row").click(function() {
                b = i - 1;
                $("#addr" + i)
                    .html($("#addr" + b).html())
                    .find("td:first-child")
                    .html(i + 1);
                $("#tab_logic").append('<tr id="addr' + (i + 1) + '"></tr>');
                i++;
            });
            $("#delete_row").click(function() {
                if (i > 1) {
                    $("#addr" + (i - 1)).html("");
                    i--;
                }
                calc();
            });
            $("#tab_logic tbody").on("keyup change", function() {
                calc();
            });
            $("#tax").on("keyup change", function() {
                calc_total();
            });
        });

        function calc() {
            $("#tab_logic tbody tr").each(function(i, element) {
                var html = $(this).html();
                if (html != "") {
                    var qty = $(this).find(".qty").val();
                    var price = $(this).find(".price").val();
                    $(this)
                        .find(".total")
                        .val(qty * price);
                    calc_total();
                }
            });
        }

        function calc_total() {
            total = 0;
            $(".total").each(function() {
                total += parseInt($(this).val());
            });
            $("#sub_total").val(total.toFixed(2));
            tax_sum = (total / 100) * $("#tax").val();
            $("#tax_amount").val(tax_sum.toFixed(2));
            $("#total_amount").val((tax_sum + total).toFixed(2));
        }
    </script>
</x-admin.layout>
