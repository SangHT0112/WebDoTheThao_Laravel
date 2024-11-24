<?php


namespace App\Http\Services;


use App\Jobs\SendMail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mail;
class CartService
{
    public function create($request)
    {
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }

        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$product_id] = $qty;
        Session::put('carts', $carts);

        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if (is_null($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
    }

    public function update($request)
    {
        Session::put('carts', $request->input('num_product'));
        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);
        Session::forget('name');
        Session::forget('phone');
        Session::forget('address');
        Session::forget('email');
        Session::forget('contents');
        Session::put('carts', $carts);
        return true;
    }

    public function addCart($request)
    {


            DB::beginTransaction();

            $carts = Session::get('carts');

            if (is_null($carts))
                return false;

            $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'content' => $request->input('content'),
                'total'=>$request->input('totals'),
                'khuyenmai' => $request->input('khuyenmai'),
                'coupon'=>$request->input('couponss'),
            ]);
            $emailnhan=$request->input('email');
            $nguoinhan=$request->input('name');

            $Idproducts=array_keys($carts);
            $getProducts=Product::whereIn('id', $Idproducts)->where('active',1)->get();
        Mail::send('frontend.mail',[
            'carts'=>$carts,
            'getProducts'=>$getProducts,
            'address'=>$request->input('address'),
            'khuyenmai'=>$request->input('khuyenmai'),
            'total'=>$request->input('totals')
        ],function ($email) use ($emailnhan,$nguoinhan){
            $email->subject('Xác nhận');
            $email->to($emailnhan,$nguoinhan);
        });
            $this->infoProductCart($carts, $customer->id);

            DB::commit();
            Session::flash('success', 'Đặt Hàng Thành Công');

            #Queue
            #SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));
            Session::forget('name');
            Session::forget('phone');
            Session::forget('address');
            Session::forget('email');
            Session::forget('contents');
            Session::forget('coupon');
            Session::forget('carts');


        return true;
    }

    protected function infoProductCart($carts, $customer_id)
    {
        $productId = array_keys($carts);
        $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'customer_id' => $customer_id,
                'product_id' => $product->id,
                'pty'   => $carts[$product->id],
                'price' => $product->price_sale != 0 ? $product->price_sale : $product->price
            ];
        }

        return Cart::insert($data);
    }

    public function getCustomer()
    {
        return Customer::orderByDesc('id')->paginate(15);
    }

    public function getProductForCart($customer)
    {
        return $customer->carts()->with(['product' => function ($query) {
            $query->select('id', 'name', 'thumb');
        }])->get();
    }
}
