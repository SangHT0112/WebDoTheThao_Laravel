@extends('frontend.main')
@section('content')
<div class="container p-t-80">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="/" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<a href="/danh-muc/{{ $product->menu->id }}-{{ Str::slug($product->menu->name) }}.html"
		   class="stext-109 cl8 hov-cl1 trans-04" style="font-family:  Roboto, sans-serif;">

			{{ $product->menu->name }}
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>

		<span class="stext-109 cl4" style="font-family:  Roboto, sans-serif;">
			{{ $title }}
		</span>
	</div>
</div>

    <!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7 p-b-30">
                    <div class="p-l-25 p-r-30 p-lr-0-lg">
                        <div class="wrap-slick3 flex-sb flex-w">
                            <div class="wrap-slick3-dots">
                                <ul class="slick3-dots" style="" role="tablist">
                                    <li class="slick-active" role="presentation">
                                        <img src="{{ $product->thumb }}">
                                        <div class="slick3-dot-overlay"></div>
                                    </li>
                                </ul>
                            </div>


                            <div class="slick3 gallery-lb slick-initialized slick-slider slick-dotted">
                                <div class="slick-list draggable">
                                    <div class="slick-track" style="opacity: 1; width: 1539px;">
                                        <div class="item-slick3 slick-slide slick-current slick-active"
                                              data-slick-index="0"
                                             aria-hidden="false"
                                             style="width: 513px; position: relative; left: 0px; top: 0px; z-index: 999; opacity: 1;"
                                             tabindex="0" role="tabpanel" id="slick-slide10"
                                             aria-describedby="slick-slide-control10">
                                            <div class="wrap-pic-w pos-relative">
                                                <img src="{{ $product->thumb }}" alt="IMG-PRODUCT">


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">

                        @include('admin.alert')

                        <h4 class="mtext-105 cl2 js-name-detail p-b-14" style="font-family:  Roboto, sans-serif;">
                            {{ $title }}
                        </h4>

                        <span class="mtext-106 cl2">
							 @if( $product->price_sale >0)
                                <span style="text-decoration: line-through;font-size:15px">{{number_format($product->price)}} VNĐ <br> </span>
                                <span style="color:red;font-size: 20px">{{number_format($product->price_sale)}} VNĐ </span>
                            @elseif( $product->price_sale==0 && $product->price >0)
                                <span style="font-size:20px">{{number_format($product->price)}} VNĐ <br> </span>
                            @else
                                <a href="#" style="color: red" >LIÊN HỆ</a>
                            @endif
						</span>

                        <p class="stext-102 cl3 p-t-23" style="font-family:  Roboto, sans-serif;">
                            {{ $product->description }}
                        </p>

                        <!--  -->
                        <div class="p-t-33">
                            <div class="flex-w flex-r-m p-b-10">
                                <div class="size-204 flex-w flex-m respon6-next">
                                    <form action="/add-cart" method="post">
                                        @if ($product->price !== NULL)
                                            <div class="wrap-num-product flex-w m-r-20 m-tb-10">
                                                <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-minus"></i>
                                                </div>

                                                <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                       name="num_product" value="1">

                                                <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                    <i class="fs-16 zmdi zmdi-plus"></i>
                                                </div>
                                            </div>


                                            <button type="submit"
                                                    class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 " style="font-family:  Roboto, sans-serif; position: relative;left: -11px">
                                                Thêm Giỏ Hàng
                                            </button>
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        @endif
                                            @csrf
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!--  -->
                        <div class="flex-w flex-m p-l-100 p-t-40 respon7" style="position: relative;left: 31px;top:-20px">


                            <a href="https://www.facebook.com/fishtieuphu/" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                               data-tooltip="Facebook">
                                <i class="fa fa-facebook"></i>
                            </a>

                            <a href="https://www.youtube.com/@26.nguyenminhphat52" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                               data-tooltip="YouTube">
                                <i class="fa fa-youtube"></i>
                            </a>

                                <a href="mailto:macarada77@gmail.com" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100"
                               data-tooltip="Google Plus">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bor10 m-t-50 p-t-43 p-b-40">
                <!-- Tab01 -->
                <div class="tab01">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item p-b-10">
                            <a class="nav-link active" data-toggle="tab" href="#description" role="tab" style="font-family:  Roboto, sans-serif;">Mô Tả Sản Phẩm</a>
                        </li>

                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content p-t-43">
                        <!-- - -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <div class="how-pos2 p-lr-15-md">
                                <p class="stext-102 cl6" style="font-family:  Roboto, sans-serif;">
                                    {!! $product->content !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">

            <span class="stext-107 cl6 p-lr-25" style="font-family:  Roboto, sans-serif;">
				Loại Sản Phẩm: {{ $product->menu->name }}
			</span>
        </div>
    </section>

	<section class="sec-relate-product bg0 p-t-45 p-b-105">
        <div class="container">
            <div class="p-b-45">
                <h3 class="ltext-106 cl5 txt-center" style="font-family:  Roboto, sans-serif;">
                   Xem thêm sản phẩm
                </h3>
            </div>

            @include('frontend.products.list')
        </div>
    </section>

@endsection
