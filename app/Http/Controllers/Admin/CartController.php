<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UserExport;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use Symfony\Component\HttpFoundation\Session\Session;
use Maatwebsite\Excel\Facades\Excel;



class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
        Customer::whereNull('token')->where('created_at', '<', now()->subDay())->delete();
    }

    public function index()
    {
        return view('admin.carts.customer', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }


    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);

        return view('admin.carts.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }

    public function doanhthu()
    {
        $doanhthu = session('doanhthu');

        return view('admin.carts.doanhthu', [
            'title' => 'Doanh Thu',
            'doanhthu' => $doanhthu
        ]);
    }

    public function postdoanhthu(Request $request)
    {
        if ($request->has('tungay') && $request->has('denngay')) {
            $doanhthu = Customer::whereBetween('created_at', [$request->tungay, $request->denngay])
                ->whereNotNull('token')
                ->selectRaw('DATE(created_at) as date, SUM(total) as total')
                ->groupBy('date')
                ->orderBy('date', 'asc')
                ->get();
            if($doanhthu->isEmpty()){
                return redirect()->back()->with('error','Không có doanh thu!');
            }
            session(['doanhthu' => $doanhthu]);
            session(['tungay'=>$request->tungay]);
            session(['denngay'=>$request->denngay]);
            return redirect()->back();
        }


    }

    public function xuatexcel(Request $request)
    {
        $kt=Customer::whereBetween('created_at', [$request->tungay, $request->denngay])->whereNotNull('token')->get();
        if($kt->isEmpty()){
            return redirect()->back()->with('error','Không có doanh thu!');
        }
        $tungay=$request->tungay;
        $denngay=$request->denngay;
        return Excel::download(new UserExport($tungay,$denngay), 'danh-sach-doanh-thu.xlsx');
    }

}
