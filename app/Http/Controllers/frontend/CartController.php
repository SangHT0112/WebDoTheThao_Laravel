<?php

namespace App\Http\Controllers\frontend;


use App\Models\Coupon;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $result = $this->cartService->create($request);
        if ($result === false) {
            return redirect()->back();
        }
        return redirect('/carts');
    }

    public function show()
    {
        $products = $this->cartService->getProduct();
        $coupons=Session::get('coupon');
        return view('frontend.carts.lists', [
            'title' => 'Giỏ Hàng',
            'products' => $products,
            'carts' => Session::get('carts'),
            'coupon' =>  $coupons
        ]);
    }

    public function update(Request $request)
    {
        $this->cartService->update($request);

        return redirect()->back();
    }

    public function remove($id = 0)
    {
        $this->cartService->remove($id);

        return redirect('/carts');
    }

    public function addCart(Request $request)
    {
        $this->cartService->addCart($request);

        return redirect()->back();
    }

    public function applyCoupon(Request $request)
    {
        if ($request->has('coupon') && $request->coupon != '') {
            $KhachHang =Customer::where('email',$request->email)->first();
            if ($KhachHang) {

                    return redirect('/carts')->with('error', 'Bạn đã sử dụng mã giảm giá rồi!');
                }
            $onecoupon = Coupon::where('coupon', $request->coupon)->first();
            if($onecoupon) {
                Session::put(['name' => $request->name]);
                Session::put(['phone' => $request->phone]);
                Session::put(['address' => $request->address]);
                Session::put(['email' => $request->email]);
                Session::put(['contents' => $request->contents]);

                if ($onecoupon->quantity > 0) {
                    $newquantity = $onecoupon->quantity - 1;
                    Coupon::where('coupon', $onecoupon->coupon)->update(['quantity' => $newquantity]);
                    Session::put('coupon', [
                        'macoupon' => $onecoupon->coupon,
                        'gia' => $onecoupon->giam
                    ]);
                    return redirect()->back();
                }
                $onecoupon->delete();
                return redirect('/carts')->with('error','Mã giảm giá đã hết!');
            }
        }

        return redirect('/carts')->with('error','Mã giảm giá không đúng!');
    }
}
