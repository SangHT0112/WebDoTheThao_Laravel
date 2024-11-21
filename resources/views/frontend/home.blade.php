@extends('frontend/main')

@section('content')
    <!-- Slider -->
    <section class="section-slide">
        <div class="wrap-slick1">
            <div class="slick1">

                @foreach($sliders as $slider)

                    <div class="item-slick1" style="background-image: url({{ $slider->thumb }});">
                        <div class="container h-full">
                            <div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
                                <div class="layer-slick1 animated visible-false" data-appear="fadeInDown"
                                     data-delay="0">
                            <span class="ltext-101 cl2 respon2">
                                HOT 2024
                            </span>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="fadeInUp"
                                     data-delay="800">
                                    <h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
                                        {{ $slider->name }}
                                    </h2>
                                </div>

                                <div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
                                    <a href="{{ $slider->url }}"
                                       class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
                                        Shop Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Banner -->
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <div class="container">
            <div class="row">

                @for($i=0;$i<3;$i++)
                    @if(empty($menus[$i]->id))
                        @break
                    @endif
                    <div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
                        <!-- Block1 -->
                        <div class="block1 wrap-pic-w">
                            <img src="/template/frontend/images/banner-01.jpg" alt="IMG-BANNER">

                            <a href="/danh-muc/{{ $menus[$i]->id }}-{{ \Str::slug($menus[$i]->name, '-') }}.html"
                               class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
                                <div class="block1-txt-child1 flex-col-l">
                            <span class="block1-name ltext-102 trans-04 p-b-8">
                                {{ $menus[$i]->name }}
                            </span>

                                    <span class="block1-info stext-102 trans-04">
                                HOT 2024
                            </span>
                                </div>

                                <div class="block1-txt-child2 p-b-4 trans-05">
                                    <div class="block1-link stext-101 cl0 trans-09">
                                        Shop Now
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>


    <div class="sec-news bg0 p-t-50 p-b-50">
        <div class="container">
            <div class="row">
                <!-- Tin Tức -->
                @foreach($news as $new)
                    <div class="col-md-6 p-b-30">
                        <div class="block-news wrap-pic-w d-flex">

                            <a href="{{asset('storage/'.$new->imgs)}}" class="block-news-txt">
                                <img src="{{asset('storage/'.$new->imgs)}}" alt="news image" class="rounded-circle" style="width: 250px; height: 250px; object-fit: cover;">
                            </a>

                            <div class="block-news-content ml-4">
                                <div class="block-news-title">
                                    <h4 class="ltext-103 cl5">{{$new->title}}</h4>
                                </div>
                                <div class="block-news-desc">
                                    <p class="stext-102 cl6" >{{$new->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>



        </div>
    </div>
    <!-- Đoạn Giới Thiệu và Video -->
    <div class="row p-t-30">
        <div class="col-12">
            <div class="full-screen-section bg-dark text-white p-4">
                <div class="d-flex justify-content-between align-items-center">

                    <div class="col-md-6">
                        <h2 class="ltext-104 cl5" style="font-family: 'Merriweather', serif;color: white">GIỚI THIỆU</h2>
                        <p class="stext-102 cl6" style="color: white">
                            {{$video->cmt}}
                        </p>
                    </div>


                    <div class="col-md-6 p-l-30">


                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item"
                                    src="{{asset('/template/frontend/images/'.$video->description)}}"
                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="divider" style="border-top: 2px solid #ccc; margin: 20px 0;"></div>
    <!-- Product -->
    <section class="bg0 p-t-23 p-b-140">
        <div class="container">
            <div class="p-b-10">
                <h3 class="ltext-103 cl5">
                    Tổng Quan Sản Phẩm
                </h3>
            </div>

            <div class="flex-w flex-sb-m p-b-52">
                <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                        Tất Cả Sản Phẩm
                    </button>
                </div>
            </div>

            <div id="loadProduct">
                @include('frontend/products/list')
            </div>


            <!-- Load more -->
            <div class="flex-c-m flex-w w-full p-t-45" id="button-loadMore">
                <input type="hidden" value="1" id="page">
                <a onclick="loadMore()" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                    Xem Thêm Sản Phẩm
                </a>
            </div>
            <div class="divider" style="border-top: 2px solid #ccc; margin: 20px 0;"></div>

            <!-- Thông tin bổ sung dưới Load More với màu nền vàng ngà -->
            <div class="flex-w w-full p-t-45 bg-light-yellow">
                <div class="col-md-3 p-b-30">
                    <div class="flex-c-m stext-101 cl5">
                        <!-- Hình ảnh minh họa cho Hoàn trả miễn phí -->
                        <img src="/template/frontend/images/iconproductreturn.png" alt="Hoàn trả miễn phí" style="width: 50px; margin-right: 10px;">
                        <span>Hoàn trả miễn phí</span>
                    </div>
                </div>
                <div class="col-md-3 p-b-30">
                    <div class="flex-c-m stext-101 cl5">
                        <!-- Hình ảnh minh họa cho Giao hàng nhanh -->
                        <img src="/template/frontend/images/producticon.png" alt="Giao hàng nhanh" style="width: 50px; margin-right: 10px;">
                        <span>Giao hàng nhanh</span>
                    </div>
                </div>
                <div class="col-md-3 p-b-30">
                    <div class="flex-c-m stext-101 cl5">
                        <!-- Hình ảnh minh họa cho Hỗ trợ nhanh chóng -->
                        <img src="/template/frontend/images/iconsupport.png" alt="Hỗ trợ nhanh chóng" style="width: 50px; margin-right: 10px;">
                        <span>Hỗ trợ nhanh chóng</span>
                    </div>
                </div>
                <div class="col-md-3 p-b-30">
                    <div class="flex-c-m stext-101 cl5">
                        <!-- Hình ảnh minh họa cho Thanh toán đa dạng -->
                        <img src="/template/frontend/images/iconcreditcard.png" alt="Thanh toán đa dạng" style="width: 50px; margin-right: 10px;">
                        <span>Thanh toán đa dạng</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
