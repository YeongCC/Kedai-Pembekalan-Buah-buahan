<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class order_detail extends Model
{
    protected $fillable = ['id', 'Order_id', 'Order_Product', 'Order_Quantity', 'Order_Price'];
    use HasFactory;

    public static function productDetail($Order_id) {
        $orders = DB::table('orders')
        ->leftjoin('order_details', 'orders.Customer_order_id', '=', 'order_details.Order_id')
        ->select('order_details.*')
        ->get();
        return $orders;
    }
}
