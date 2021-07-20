<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class ShowProductController extends Controller
{
    public function showProduct()
    {
        $product = product::getProducts('');
        return view('welcome')->with('product', $product);
    }

    public function getMoreProducts()
    {
        $r = request();
        $query = $r->search_query;
        if ($r->ajax()) {
            $product = product::getProducts($query);
            if(count($product)==0){
                return view('error/cusNoResult');
            }
            return view('customer/cusProductCard', compact('product'))->render();
        }
    }
}
