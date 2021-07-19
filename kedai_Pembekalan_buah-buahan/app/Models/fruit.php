<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class fruit extends Model
{
    protected $fillable = ['id', 'Fruit_Name', 'Fruit_Picture', 'Fruit_Price', 'Fruit_Brand', 'Fruit_Quantity', 'Fruit_Weight', 'Fruit_Pack', 'Fruit_Status'];

    use HasFactory;

    public static function getFruits($search_keyword) {
        $product = DB::table('fruits');

        if($search_keyword && !empty($search_keyword)) {
            $product->where(function($q) use ($search_keyword) {
                $q->where('fruits.Fruit_Name', 'like', "%{$search_keyword}%")
                ->orWhere('fruits.Fruit_Brand', 'like', "%{$search_keyword}%")
                ->orWhere('fruits.Fruit_Price', 'like', "%{$search_keyword}%");
            });
        }

        return $product->paginate(PER_PAGE_LIMIT);
    }
}
