@extends('frontend.main')
@section('content')
    <form class="bg0 p-t-130 p-b-85" method="post" action="{{route('carts.post')}}" >
        @include('admin.alert')

        @if (count($products) != 0)
            <div class="container" >
                <div class="row" >
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50" >
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart" style="width: 720px;box-sizing: border-box; position: relative; z-index: 10;">
                                @php $total = 0; @endphp
                                <table class="table-shopping-cart" >
                                    <tbody>
                                    <tr class="table_head" style="background-color: #f4f4f4;">
                                        <th class="column-1" style="padding: 15px 20px; width: 200px; text-align: center;">Product</th>
                                        <th class="column-2" style="padding: 15px 20px; width: 250px; text-align: left;"></th>
                                        <th class="column-3" style="padding: 15px 20px; width: 150px; text-align: right;">Price</th>
                                        <th class="column-4" style="padding: 15px 20px; width: 200px; text-align: center;">Quantity</th>
                                        <th class="column-5" style="padding: 15px 20px; width: 150px; text-align: right;">Total</th>
                                        <th class="column-6" style="padding: 15px 20px; width: 120px; text-align: center;">&nbsp;</th>
                                    </tr>

                                    @foreach($products as $key => $product)
                                        @if($carts[$product->id] !=0)
                                        @php
                                            $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                            $priceEnd = $price * $carts[$product->id];
                                            $total += $priceEnd;
                                        @endphp
                                        <tr class="table_row" style="line-height: 1.6;">
                                            <td class="column-1" style="padding: 15px 20px; width: 200px; text-align: center;">
                                                <div class="how-itemcart1">
                                                    <img src="{{ $product->thumb }}" alt="IMG">
                                                </div>
                                            </td>
                                            <td class="column-2" style="padding: 15px 20px; width: 250px; text-align: left;">{{ $product->name }}</td>

                                            <td class="column-3" style="padding: 15px 20px; width: 150px; text-align: right;">
                                                {{ number_format($price, 0, '', '.') }} VNĐ
                                            </td>
                                            <td class="column-4" style="padding: 15px 20px; width: 200px; text-align: center;">
                                                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>

                                                    <input class="mtext-104 cl3 txt-center num-product" type="number"
                                                           name="num_product[{{ $product->id }}]" value="{{ $carts[$product->id] }}">

                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="column-5" style="padding: 15px 20px; width: 150px; text-align: right;">
                                                {{ number_format($priceEnd, 0, '', '.') }} VNĐ
                                            </td>
                                            <td class="p-r-15" style="padding: 15px 20px; width: 120px; text-align: center;">
                                                <a href="{{route('carts.delete', $product->id )}}" style="color: red;">Xóa</a>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach


                                    </tbody>
                                </table>
                            </div>

                            <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm" style="width: 720px">
                                <div class="flex-w flex-m m-r-20 m-tb-5">
                                    <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text"
                                        name="coupon" placeholder="Coupon Code" value="" >

                                    <input type="submit" value="Apply coupon" formaction="{{route('apply.coupon')}}"
                                           class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">


                                </div>

                                    <input type="submit" value="Cập Nhật Giỏ Hàng" formaction="/update-cart"
                                    class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                @csrf
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                {{$title}}
                            </h4>

                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
                                    <span class="mtext-101 cl2">
                                        Total:
                                    </span>
                                </div>

                                <div class="size-209 p-t-1">
                                    <span class="mtext-110 cl2">
                                        @php

                                        @endphp
                                        @if($coupon && isset($coupon['gia']))
                                        @php
                                            $gia =  $coupon['gia'];
                                            if($gia < 1) {
                                                $total = $total - ($total * $gia);
                                            } else {
                                                $total = $total - $gia;
                                            }
                                        @endphp
                                        @endif

                                        {{ number_format($total, 0, '', '.') }} VNĐ
                                    </span>
                                    <input type="number" name="totals" step="0.01" value="{{$total}}" hidden >
                                    @if($coupon && isset($coupon['gia']))
                                        <input type="number" name="khuyenmai" step="0.01" value="{{ $coupon['gia'] }}" hidden >
                                        <input type="text" name="couponss"  value="{{ $coupon['macoupon'] }}" hidden >
                                    @else
                                        <input type="number" name="khuyenmai" step="0.01" value="0" hidden>
                                        <input type="text" name="couponss"  value="" hidden >
                                    @endif
                                </div>
                            </div>

                            <div class="flex-w flex-t bor12 p-t-15 p-b-30">

                                <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">

                                    <div class="p-t-15">
                                        <span class="stext-112 cl8">
                                            Thông Tin Khách Hàng
                                        </span>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15"
                                                   type="text" name="name"
                                                   value="{{ Session::get('name') }}"
                                                   placeholder="Tên khách Hàng" required>
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15"
                                                   type="text" name="phone"
                                                   value="{{ Session::get('phone') }}"
                                                   placeholder="Số Điện Thoại" required>
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15"
                                                   type="text" name="address"
                                                   value="{{ Session::get('address') }}"
                                                   placeholder="Địa Chỉ Giao Hàng">
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15"
                                                   type="text" name="email"
                                                   value="{{ Session::get('email') }}"
                                                   placeholder="Email Liên Hệ">
                                        </div>

                                        <div class="bor8 bg0 m-b-12">
                                           <textarea class="cl8 plh3 size-111 p-lr-15"
                                                     name="contents">{{ Session::get('contents') }}</textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <input type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" value="Đặt Hàng">

                        </div>
                    </div>
                </div>
            </div>
    </form>
@else
    <div class="text-center" style="height: 500px">

            <img src="{{ asset('/template/frontend/images/R.png') }}" alt="Empty Cart" style="width: 500px">


        <div class="header-cart-item-txt p-t-8" style="margin-left: 30px">
            <span class="header-cart-item-name" style="font-size: 20px">Oops! Giỏ hàng của bạn trống!</span>
        </div>
    </div>
@endif
@endsection
