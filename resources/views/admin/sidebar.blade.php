    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-solid fa-user-tie"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Clothing<sup>Store</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Categories"
                aria-expanded="true" aria-controls="Categories">
                <i class="fas fa-fw fa-tags"></i>
                <span>Categories</span>
            </a>
            <div id="Categories" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="{{ route('admin.categories.index') }}">All Categories</a>
                    <a class="collapse-item" href="{{ route('admin.categories.create') }}">Create Categorey</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Products"
                aria-expanded="true" aria-controls="Products">
                <i class="fas fa-fw fa-box-open"></i>
                <span>Products</span>
            </a>
            <div id="Products" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="{{ route('admin.products.index') }}">All Products</a>
                    <a class="collapse-item" href="{{ route('admin.products.create') }}">Create Products</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Discounts"
                aria-expanded="true" aria-controls="Discounts">
                <i class="fas fa-thin fa-percent"></i>
                <span>Discounts</span>
            </a>
            <div id="Discounts" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="{{ route('admin.discounts.index') }}">All Discounts</a>
                    <a class="collapse-item" href="{{ route('admin.discounts.create') }}">Create Discount</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- slider -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Slider"
                aria-expanded="true" aria-controls="Slider">
                <i class="fas fa-thin fa-percent"></i>
                <span>Slider</span>
            </a>
            <div id="Slider" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="{{ route('admin.sliders.index') }}">All Slider</a>
                    <a class="collapse-item" href="{{ route('admin.sliders.create') }}">Create Slider</a>
                </div>
            </div>
        </li>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <li class="nav-item">
             <a class="nav-link" href="index.html">
                <i class="fas fa-brands fa-jedi"></i>
                <span>Orders</span></a>
         </li>

          <!-- Divider -->
        {{-- <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-duotone fa-users"></i>
                <span>Customers</span></a>
        </li> --}}
         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <li class="nav-item">
             <a class="nav-link" href="index.html">
                 <i class="fas fa-duotone fa-comments"></i>
                 <span>Reviews</span></a>
         </li>
          <!-- Divider -->
        {{-- <hr class="sidebar-divider my-0"> --}}

        {{-- <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="fas fa-solid fa-file"></i>
                <span>Reports</span></a>
        </li> --}}

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
