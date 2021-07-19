<?php

namespace App\Http\Controllers;

use App\Models\fruit;
use Session;
use Illuminate\Http\Request;

class FruitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function interface()
    {
        return view('product/insertProduct');
    }

    public function store(Request $r)
    {
        $r->validate([
            'Product_Name'=>'required',
            'product_image'=>'required',
            'Fruit_Price'=>'required',
        ],[
            'Product_Name.required'=>'Product field is required',
            'product_image.required'=>'Image is required',
            'Fruit_Price.required'=>'Product price field is required',
        ]);
        $Brand = $r->Fruit_Brand;
        $Quantity = $r->Fruit_Quantity;
        $Weight = $r->Fruit_Weight;
        $Pack = $r->Fruit_Pack;
        $image = $r->file('product_image');
        $image->move('images/product', $image->getClientOriginalName());
        $imageName = $image->getClientOriginalName();
        if ($Brand == null) {
            $Brand = " ";
        }
        if ($Quantity == null) {
            $Quantity = " ";
        }
        if ($Weight == null) {
            $Weight = " ";
        }
        if ($Pack == null) {
            $Pack = " ";
        }
        $insertFruit = fruit::create([
            'Fruit_Name' => $r->Product_Name,
            'Fruit_Picture' => $imageName,
            'Fruit_Price' => $r->Fruit_Price,
            'Fruit_Brand' => $Brand,
            'Fruit_Quantity' => $Quantity,
            'Fruit_Weight' => $Weight,
            'Fruit_Pack' => $Pack,
            'Fruit_Status' => "1",
        ]);
        Session::flash('insert', 'Product insert successful!');
        return redirect()->route('home');
    }

    public function show()
    {
        $product = fruit::getFruits('');
        return view('product/showManageProduct')->with('product', $product);
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

    public function edit($id)
    {
        $product = fruit::all()->where('id', $id);
        return view('product/UpdateProduct')->with('product', $product);
    }

    public function update(Request $r)
    {
        $r->validate([
            'Product_Name'=>'required',
            'Fruit_Price'=>'required',
        ],[
            'Product_Name.required'=>'Product field is required',
            'Fruit_Price.required'=>'Product price field is required',
        ]);
        $product = fruit::find($r->id);
        if ($r->file('product_image') != '') {
            $image = $r->file('product_image');
            $image->move('images/product', $image->getClientOriginalName());
            $imageName = $image->getClientOriginalName();
            $product->Fruit_Picture = $imageName;
        }
        $Brand = $r->Fruit_Brand;
        $Quantity = $r->Fruit_Quantity;
        $Weight = $r->Fruit_Weight;
        $Pack = $r->Fruit_Pack;
        if ($Brand == null) {
            $product->Fruit_Brand = " ";
        }
        if ($Quantity == null) {
            $product->Fruit_Quantity = " ";
        }
        if ($Weight == null) {
            $product->Fruit_Weight = " ";
        }
        if ($Pack == null) {
            $product->Fruit_Pack = " ";
        }
        $product->Fruit_Name = $r->Product_Name;
        $product->Fruit_Price = $r->Fruit_Price;
        $product->save();
        Session::flash('update', 'Product update successful!');
        return redirect()->route('viewProduct');
    }

    public function delete($id)
    {
        $products = fruit::find($id);
        $products->delete();
        Session::flash('delete', 'Delete Sucessful');
        return redirect()->route('viewProduct');
    }

    public function hide($id, $status)
    {
        $product = fruit::find($id);
        if ($status == "1") {
            $product->Fruit_Status = "2";
        } else {
            $product->Fruit_Status = "1";
        }

        $product->save();
        return redirect()->route('viewProduct');
    }
}
