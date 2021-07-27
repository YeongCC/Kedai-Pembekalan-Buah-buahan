<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class order extends Model
{
    protected $fillable = ['id', 'Customer_order_id', 'Customer_Name', 'Customer_Address', 'Customer_Phone', 'Customer_Receive_Day', 'Customer_Messages', 'Customer_Total_Price', 'Customer_Status'];

    use HasFactory;

    public static function getOrders($search_keyword) {
        $order = DB::table('orders');

        if($search_keyword && !empty($search_keyword)) {
            $order->where(function($q) use ($search_keyword) {
                $q->where('orders.Customer_order_id', 'like', "%{$search_keyword}%")
                ->orWhere('orders.Customer_Name', 'like', "%{$search_keyword}%");
            });
        }
        return $order->latest()->paginate(PER_PAGE_LIMIT);
    }

}
