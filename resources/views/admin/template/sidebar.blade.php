<!--Start sidebar-wrapper-->
<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
    <div class="brand-logo">
        <a href="#">
            <img src="{{ asset('themes/templateproject/asset/image/pp logo 1.png')}}" height="35px" width="35px" alt="">            
            <h5 class="logo-text m-2"> Pamer Produk </h5>
        </a>
    </div>

        <ul class="sidebar-menu do-nicescrol">
            <li class="sidebar-header">MENU</li>
                
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

            <li>
                <a href="{{ url('admin/users')}}">
                    <i class="zmdi zmdi-accounts-list-alt"></i> <span>Users</span>
                </a>
            </li>

            
            <li>
                <a href="{{ url('admin/roles')}}">
                    <i class="zmdi zmdi-accounts"></i> <span>Role and Permission</span>
                </a>
            </li>
            

        </ul>
    
</div>
<!--End sidebar-wrapper-->
