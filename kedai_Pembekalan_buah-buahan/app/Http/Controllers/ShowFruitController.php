<?php

namespace App\Http\Controllers;
use App\Models\fruit;
use Illuminate\Http\Request;

class ShowFruitController extends Controller
{
    public function show()
    {
        $product = fruit::all();
        return view('welcome')->with('product', $product);
    }

    public function getMoreFruits()
    {
        $r = request();
        $query = $r->search_query;
        if ($r->ajax()) {
            $product = fruit::getFruits($query);
            return view('product.assests.productCard', compact('product'))->render();
        }
    }
}
