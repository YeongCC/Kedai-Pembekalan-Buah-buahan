<?php

namespace App\Http\Controllers;
use App\Models\order;
use App\Models\order_detail;
use Illuminate\Http\Request;

class ShowOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewOrder()
    {
        $order = order::getOrders('');
        return view('auth/receipt/checkReceipt')->with('order', $order);
    }

    public function getMoreOrders()
    {
        $r = request();
        $query = $r->search_query;
        if ($r->ajax()) {
            $order = order::getOrders($query);
            if(count($order)==0){
                return view('error/orderNoResult');
            }
            return view('auth/receipt/receiptCard', compact('order'))->render();
        }
    }

    public function checkOrderDetails($Customer_order_id)
    {
        $order = order::all()->where('Customer_order_id', $Customer_order_id);
        $order_detail = order_detail::productDetail($Customer_order_id);

        return view('auth/receipt/receiptDetail')->with('order', $order)->with('order_detail', $order_detail);
    }

    public function setOrderStatus($Customer_order_id, $Customer_Status)
    {
        $order = order::find($Customer_order_id);
        if ($Customer_Status == "1") {
            $order->Customer_Status="2";
        }

        $order->save();
        return redirect()->back();
    }

}
