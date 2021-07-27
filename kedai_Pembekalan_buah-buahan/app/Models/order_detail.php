<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class order_detail extends Model
{
    protected $fillable = ['Order_IdDetails', 'Order_Product', 'Order_Quantity', 'Order_Price'];
    use HasFactory;

    public static function productDetail($Order_id)
    {
        $orders = DB::table('order_details')->where('Order_IdDetails', '=', $Order_id)
            ->get();

        return $orders;
    }


}
