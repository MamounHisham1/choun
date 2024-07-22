 <!--! ================================================================ !-->
 <!--! [Start] Navigation Manu !-->
 <!--! ================================================================ !-->
 <nav class="nxl-navigation">
     <div class="navbar-wrapper">
         <div class="m-header">
             <a href="/" class="b-brand">
                 <!-- ========   change your logo hear   ============ -->
                 <img src="/assets/images/logo-full.png" alt="" class="logo logo-lg" />
                 <img src="/assets/images/logo-abbr.png" alt="" class="logo logo-sm" />
             </a>
         </div>
         <div class="navbar-content">
             <ul class="nxl-navbar">
                 <x-nav.dropdown name="Dashboards" class="feather-airplay">
                     <x-nav.droplist-item href="#">CRM</x-nav.droplist-item>
                     <x-nav.droplist-item href="#">Analytics</x-nav.droplist-item>
                 </x-nav.dropdown>
                 <x-nav.dropdown name="Reports" class="feather-cast">
                    <x-nav.droplist-item href="#">Sales Report</x-nav.droplist-item>
                    <x-nav.droplist-item href="#">Leads Report</x-nav.droplist-item>                     
                    <x-nav.droplist-item href="#">Project Report</x-nav.droplist-item>
                    <x-nav.droplist-item href="#">Timesheets Report</x-nav.droplist-item>                     
                 </x-nav.dropdown>
                 <x-nav.dropdown name="Products" class="fa-brands fa-product-hunt">
                     <x-nav.droplist-item href="/products/create">Create Product</x-nav.droplist-item>
                 </x-nav.dropdown>
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
