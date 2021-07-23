<?php

namespace App\Http\Controllers;

use App\Models\product;
use Session;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Productinterface()
    {
        return view('product/insertProduct');
    }

    public function store(Request $r)
    {
        $r->validate([
            'Product_Name'=>'required',
            'product_image'=>'required',
            'Product_Price'=>'required|numeric',
        ],[
            'Product_Name.required'=>'Product field is required.',
            'product_image.required'=>'Image is required.',
            'Product_Price.required'=>'Product Price field is required.',
            'Product_Price.numeric'=>'Product Price field must be number.',
        ]);
        $image = $r->file('product_image');
        $image->move('images/product', $image->getClientOriginalName());
        $imageName = $image->getClientOriginalName();
        $insertProduct = product::create([
            'Product_Name' => $r->Product_Name,
            'Product_Picture' => $imageName,
            'Product_Price' => $r->Product_Price,
            'Product_Status' => "1",
        ]);
        Session::flash('insert', 'Product insert successful!');
        return redirect()->route('home');
    }

    public function viewProduct()
    {
        $product = product::getProducts('');
        return view('product/showManageProduct')->with('product', $product);
    }

    public function getMoreProducts()
    {
        $r = request();
        $query = $r->search_query;
        if ($r->ajax()) {
            $product = product::getProducts($query);
            if(count($product)==0){
                return view('error/adminNoResult');
            }
            return view('product/assests/productCard', compact('product'))->render();
        }
    }

    public function edit($id)
    {
        $product = product::all()->where('id', $id);
        return view('product/UpdateProduct')->with('product', $product);
    }

    public function update(Request $r)
    {
        $r->validate([
            'Product_Name'=>'required',
            'Product_Price'=>'required|numeric',
        ],[
            'Product_Name.required'=>'Product field is required.',
            'Product_Price.required'=>'Product price field is required.',
            'Product_Price.numeric'=>'Product Price field must be number.',
        ]);
        $product = product::find($r->id);
        if ($r->file('product_image') != '') {
            $image = $r->file('product_image');
            $image->move('images/product', $image->getClientOriginalName());
            $imageName = $image->getClientOriginalName();
            $product->Product_Picture = $imageName;
        }

        $product->Product_Name = $r->Product_Name;
        $product->Product_Price = $r->Product_Price;
        $product->save();
        Session::flash('update', 'Product update successful!');
        return redirect()->route('viewProduct');
    }

    public function delete($id)
    {
        $products = product::find($id);
        $products->delete();
        Session::flash('delete', 'Delete Sucessful');
        return redirect()->route('viewProduct');
    }

    public function hide($id, $status)
    {
        $product = product::find($id);
        if ($status == "1") {
            $product->Product_Status = "2";
        } else {
            $product->Product_Status = "1";
        }

        $product->save();
        return redirect()->route('viewProduct');
    }
}
