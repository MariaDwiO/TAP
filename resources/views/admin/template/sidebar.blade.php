<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="index.html">
            <img src="{{ URL::asset('template/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
            <h5 class="logo-text">Dashboard Admin P</h5>
        </a>
    </div>

        <ul class="sidebar-menu do-nicescrol">
            <li class="sidebar-header">MAIN NAVIGATION</li>
                
            <li>
                <a href="{{ url('admin/dashboard')}}">
                    <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{ url('admin/products')}}">
                    <i class="zmdi zmdi-collection-item"></i> <span>Products</span>
                </a>
            </li>

            <li>
                <a href="{{ url('admin/category')}}">
                    <i class="zmdi zmdi-format-list-bulleted"></i> <span>Category</span>
                </a>
            </li>

        </ul>
    
</div>
<!--End sidebar-wrapper-->
