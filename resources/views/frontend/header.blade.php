<header>

    @php
        use App\Http\Controllers\Controller;
        use Illuminate\Http\Request;
        use App\Models\Config;
             $menusHtml = \App\Helpers\Helper::menus($menus);
           $logo =Config::where('status',1)->where('name','logo')->first();
           $favicon =Config::where('status',1)->where('name','favicon')->first();
    @endphp
    <style>
        .main-menu {
            font-family:  'Roboto', sans-serif;
            display: grid;
            grid-auto-flow: column;
            gap: 1px; /* Khoảng cách giữa các mục */
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .main-menu a {
            font-family:  'Roboto', sans-serif;

            font-size: 15px;
            text-decoration: none;
            color: #333;

        }


    </style>

        <!-- Header desktop -->
    <div class="container-menu-desktop">

        <div class="wrap-menu-desktop" >
            <nav class="limiter-menu-desktop container">

                <!-- Logo desktop -->
                <a href="/" class="logo">
                    <img src="{{url("template/frontend/images/".$logo->description)}}" alt="IMG-LOGO">
                </a>

                <!-- Menu desktop -->
                <div class="menu-desktop">
                    <ul class="main-menu" >

                        <li class="active-menu"><a href="/" style="font-size: 15px;">HOME</a></li>

                        {!! $menusHtml !!}


                        <li class="active-menu">
                            <a href="{{route('saler')}}" style="font-size: 15px;">
                                BEST SALE
                                <img src="{{asset('/template/frontend/images/flash-sale.png')}}" alt="fire" style="width: 20px; height: 20px; position: relative;top: -15px;left: -5px">

                            </a>
                        </li>

                    </ul>
                </div>

                <!-- Icon header -->
                <div class="wrap-icon-header flex-w flex-r-m">
                    <ul class="navbar-nav" style="padding: 10px">
                        <li class="nav-item">
                            <form class="example" action="{{route('search')}}" method="POST" enctype="multipart/form-data" style="display: flex; align-items: center;">
                                @csrf
                                <!-- Thanh tìm kiếm (input) -->
                                <input type="text" placeholder="Search.." name="search" style="border: solid 1px blue; border-radius: 15px 0 0 15px; padding: 5px;">

                                <!-- Nút tìm kiếm (button) -->
                                <button type="submit" style="border: solid 1px blue; border-radius: 0 15px 15px 0; padding: 5px;">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </li>
                    </ul>


                    <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                         data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
                        <i class="zmdi zmdi-shopping-cart"></i>
                    </div>


                </div>
            </nav>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap-header-mobile">
        <!-- Logo moblie -->
        <div class="logo-mobile">
            <a href="/"><img src="{{url("template/frontend/images/".$logo->description)}}" alt="IMG-LOGO"></a>
        </div>

        <!-- Icon header -->
        <div class="wrap-icon-header flex-w flex-r-m m-r-15">
            <ul class="navbar-nav" style="padding: 10px">
                <li class="nav-item">
                    <form class="example" action="{{route('search')}}" method="POST" enctype="multipart/form-data" style="display: flex; align-items: center;">
                        @csrf
                        <!-- Thanh tìm kiếm (input) -->
                        <input type="text" placeholder="Search.." name="search" style="border: solid 1px blue; border-radius: 15px 0 0 15px; padding: 5px;">

                        <!-- Nút tìm kiếm (button) -->
                        <button type="submit" style="border: solid 1px blue; border-radius: 0 15px 15px 0; padding: 5px;">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </li>
            </ul>

            <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                    data-notify="{{ !is_null(\Session::get('carts')) ? count(\Session::get('carts')) : 0 }}">
                <i class="zmdi zmdi-shopping-cart"></i>
            </div>
        </div>

        <!-- Button show menu -->
        <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
        </div>
    </div>


    <!-- Menu Mobile -->
    <div class="menu-mobile">

        <ul class="main-menu-m">
            <li class="active-menu"><a href="/">HOME</a>
            </li>

            {!! $menusHtml !!}

            <li class="active-menu">
                <a href="{{route('saler')}}" style="font-size: 15px;">
                    BEST SALE
                    <img src="{{asset('/template/frontend/images/flash-sale.png')}}" alt="fire" style="width: 20px; height: 20px; position: relative;top: -15px;left: -5px">

                </a>
            </li>
        </ul>
    </div>

    <!-- Modal Search -->
    <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
        <div class="container-search-header">
            <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                <img src="images/icons/icon-close2.png" alt="CLOSE">
            </button>

            <form class="wrap-search-header flex-w p-l-15">
                <button class="flex-c-m trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>
                <input class="plh3" type="text" name="search" placeholder="Search...">
            </form>
        </div>
    </div>
</header>
