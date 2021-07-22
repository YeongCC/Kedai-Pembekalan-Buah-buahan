<?php

namespace App\Http\Controllers;

use App\Models\product;
use Session;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class CartOrderController extends Controller
{

    public function cart()
    {
        return view('customer/cart');
    }

    public function addToCart(Request $r)
    {
        $id=$r->id;
        $quantity=$r->quantity;
        $product = product::find($id);

        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->Product_Name,
                    "quantity" =>$quantity,
                    "price" => $product->Product_Price,
                    "photo" => $product->Product_Picture
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->route('cart')->with('success', 'added to cart successfully!');
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity']=$cart[$id]['quantity']+$quantity;
            session()->put('cart', $cart);
            return redirect()->route('cart')->with('success', 'Product added to cart successfully!ff');
        }
        $cart[$id] = [
            "name" => $product->Product_Name,
            "quantity" => $r->quantity,
            "price" => $product->Product_Price,
            "photo" => $product->Product_Picture
        ];

        session()->put('cart', $cart);
        return redirect()->route('cart')->with('success', 'Product added to cart successfully!');
    }

    public function addToCartModal($id)
    {
        $product = product::find($id);

        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $id => [
                    "name" => $product->Product_Name,
                    "quantity" => 1,
                    "price" => $product->Product_Price,
                    "photo" => $product->Product_Picture
                ]
            ];
            session()->put('cart', $cart);
            return response()->json($cart, 200);
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return response()->json($cart, 200);
        }
        $cart[$id] = [
            "name" => $product->Product_Name,
            "quantity" => 1,
            "price" => $product->Product_Price,
            "photo" => $product->Product_Picture
        ];

        session()->put('cart', $cart);
        return response()->json($cart, 200);
    }


    public function updateCart(Request $request)
    {
        if ($request->id and $request->quantity) {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }


    public function removeCart(Request $request)
    {
        if ($request->id) {

            $cart = session()->get('cart');

            if (isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }

    public function confirmCart()
    {
        return view('customer/confirmOrder');
    }
}
