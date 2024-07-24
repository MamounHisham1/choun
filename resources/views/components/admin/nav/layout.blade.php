 <!--! ================================================================ !-->
 <!--! [Start] Navigation Manu !-->
 <!--! ================================================================ !-->
 <nav class="nxl-navigation">
     <div class="navbar-wrapper">
         <div class="m-header">
             <a href="/admin" class="b-brand">
                 <!-- ========   change your logo hear   ============ -->
                 <img src="/assets/images/logo-full.png" alt="" class="logo logo-lg" />
                 <img src="/assets/images/logo-abbr.png" alt="" class="logo logo-sm" />
             </a>
         </div>
         <div class="navbar-content">
             <ul class="nxl-navbar">
                 <x-admin.nav.dropdown name="Dashboards" class="feather-airplay">
                     <x-admin.nav.droplist-item href="#">CRM</x-admin.nav.droplist-item>
                     <x-admin.nav.droplist-item href="#">Analytics</x-admin.nav.droplist-item>
                 </x-admin.nav.dropdown>
                 <x-admin.nav.dropdown name="Reports" class="feather-cast">
                    <x-admin.nav.droplist-item href="#">Sales Report</x-admin.nav.droplist-item>
                    <x-admin.nav.droplist-item href="#">Leads Report</x-admin.nav.droplist-item>                     
                    <x-admin.nav.droplist-item href="#">Project Report</x-admin.nav.droplist-item>
                    <x-admin.nav.droplist-item href="#">Timesheets Report</x-admin.nav.droplist-item>                     
                 </x-admin.nav.dropdown>
                 <x-admin.nav.dropdown name="Category" class="fas fa-layer-group">
                    <x-admin.nav.droplist-item href="/admin/categories">All Categories</x-admin.nav.droplist-item>
                    <x-admin.nav.droplist-item href="/admin/categories/create">Create Category</x-admin.nav.droplist-item>
                 </x-admin.nav.dropdown>
                 <x-admin.nav.dropdown name="Products" class="fa-brands fa-product-hunt">
                     <x-admin.nav.droplist-item href="/admin/products">All Products</x-admin.nav.droplist-item>
                     <x-admin.nav.droplist-item href="/admin/products/create">Create Product</x-admin.nav.droplist-item>
                 </x-admin.nav.dropdown>
             </ul>
             {{-- <div class="card text-center">
                 <div class="card-body">
                     <i class="feather-sunrise fs-4 text-dark"></i>
                     <h6 class="mt-4 text-dark fw-bolder">Downloading Center</h6>
                     <p class="fs-11 my-3 text-dark">Duralux is a production ready CRM to get started up and running
                         easily.</p>
                     <a href="javascript:void(0);" class="btn btn-primary text-dark w-100">Download Now</a>
                 </div>
             </div> --}}
         </div>
     </div>
 </nav>
 <!--! ================================================================ !-->
 <!--! [End]  Navigation Manu !-->
 <!--! ================================================================ !-->
