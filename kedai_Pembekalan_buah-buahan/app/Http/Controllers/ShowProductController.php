<?php

namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;

class ShowProductController extends Controller
{
    public function showProduct()
    {
        $product = product::getProducts('');
        return view('customer/cusShow')->with('product', $product);
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

    public function product_details($id) {
        return product::findOrFail($id);
    }

    public function view_product_details($id) {
        $product = product::all()->where('id', $id);
        return view('customer/viewProductDetail')->with('product', $product);
    }
}
