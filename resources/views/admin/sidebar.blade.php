<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    <div class="brand-link" >
        <a href="{{route('admin')}}" >
            <img src="/template/admin/dist/img/ps.png" alt="PS Logo" class="brand-image img-circle elevation-3"
                 style="opacity: 1.8;width: 50px;position: relative;left: -10px">
            <span class="brand-text font-weight-light" style="color: white">PS-Shop</span>
        </a>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image" style="position: relative;">
                <a href="{{ route('profile') }}" class="d-block" >
                    <img src="/template/admin/dist/img/admin.jpg" class="img-circle elevation-2" alt="User Image" style="width: 70px">
                </a>
                <div class="info" style="position: relative;left: -15px">
                    <a class="nav-link" style="position: relative;left: -10px;">Name: {{ Auth::user()->name }}</a>

                </div>
            </div>

                <ul class="nav flex-column" style="padding-left: 100px; position:absolute;">

                    <li class="nav-item">
                        <a href="{{ route('profile') }}" class="nav-link" style="font-size: 14px; padding-left: 10px;">
                            <i class="fa fa-user"></i> Thông tin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" class="nav-link" style="font-size: 14px; padding-left: 10px;">
                            <i class="fa fa-sign-out"></i> Đăng xuất
                        </a>

                    </li>
                </ul>




        </div>



        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('config')  }}" class="nav-link">
                        <i class="fas fa-cog fa-fw"></i>
                        <p>
                            Chỉnh sửa hệ thống
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-bars"></i>
                        <p style="margin-left: 5px;">
                            Menu
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.menus.add')  }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Menu</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.menus.list')  }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Menu</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <!-- Sản phẩm -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-store-alt"></i>
                        <p> Sản Phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/products/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Sản Phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/products/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Sản Phẩm</p>
                            </a>
                        </li>

                    </ul>
                </li>

                <!--Giỏ Hàng -->
                <!-- Sản phẩm -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p> Giỏ Hàng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/customers" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Đơn Hàng</p>
                            </a>
                        </li>

                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('doanhthu')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Doanh thu</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Sliders
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.sliders.add')  }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Sliders</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.sliders.list')  }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Sliders</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-newspaper"></i>
                        <p>
                            Tin tức
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.news.add')  }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Tin Tức</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.news.list')  }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Tin tức</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-gift" ></i>
                        <p>
                            Coupon
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.coupon.add')  }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Coupon</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.coupon.list')  }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Coupon</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>


        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
