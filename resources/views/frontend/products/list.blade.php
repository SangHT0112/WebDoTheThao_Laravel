
<div class="row isotope-grid">
    @foreach($products as $key => $product)

    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
        <!-- Block2 -->
        <div class="block2">
            <a href="{{$product->thumb}}">
            <div class="block2-pic hov-img0">
                <img src="{{$product->thumb}}" alt="{{$product->name}}">

            </div>
            </a>
            <div class="block2-txt flex-w flex-t p-t-14">
                <div class="block2-txt-child1 flex-col-l ">
                    <a href="/san-pham/{{$product->id}}--{{\Str::slug($product->name, '-')}}.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6" STYLE="font-size: 14px">
                       {{$product->name}}
                    </a>

                    @if( $product->price_sale >0)
                        <span style="text-decoration: line-through;font-size:12px">{{number_format($product->price)}} VNĐ <br> </span>
                        <span style="color:red;font-size: 15px">{{number_format($product->price_sale)}} VNĐ </span>
                    @elseif( $product->price_sale==0 && $product->price >0)
                        <span style="font-size:12px">{{number_format($product->price)}} VNĐ <br> </span>
                    @else
                        <a href="#" style="color: red">LIÊN HỆ</a>
                    @endif

                </div>


            </div>
        </div>
    </div>

    @endforeach
        <style>
            .hidden{
                display: none;
            }
        </style>
</div>

