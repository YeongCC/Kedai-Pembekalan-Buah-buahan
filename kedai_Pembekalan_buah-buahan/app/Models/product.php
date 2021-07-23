<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class product extends Model
{
    protected $fillable = ['id', 'Product_Name', 'Product_Picture', 'Product_Price', 'Product_Status'];

    use HasFactory;

    public static function getProducts($search_keyword) {
        $product = DB::table('products');

        if($search_keyword && !empty($search_keyword)) {
            $product->where(function($q) use ($search_keyword) {
                $q->where('products.Product_Name', 'like', "%{$search_keyword}%")
                ->orWhere('products.Product_Price', 'like', "%{$search_keyword}%");
            });
        }
        return $product->paginate(PER_PAGE_LIMIT);
    }
}
