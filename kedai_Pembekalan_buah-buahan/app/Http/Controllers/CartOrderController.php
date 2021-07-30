<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\order;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use PDF;
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
        $id = $r->id;
        $quantity = $r->quantity;
        $product = product::find($id);

        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $id => [
                    "product_id" => $product->id,
                    "name" => $product->Product_Name,
                    "quantity" => $quantity,
                    "price" => $product->Product_Price,
                    "photo" => $product->Product_Picture
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->route('cart')->with('success', 'added to cart successfully!');
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + $quantity;
            session()->put('cart', $cart);
            return redirect()->route('cart')->with('success', 'Product added to cart successfully!');
        }
        $cart[$id] = [
            "product_id" => $product->id,
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
                    "product_id" => $product->id,
                    "name" => $product->Product_Name,
                    "quantity" => 1,
                    "price" => $product->Product_Price,
                    "photo" => $product->Product_Picture
                ]
            ];
            session()->put('cart', $cart);
            $cart_number=count(session('cart'));
            return response()->json($cart_number, 200);
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            $cart_number=count(session('cart'));
            return response()->json($cart_number, 200);
        }
        $cart[$id] = [
            "product_id" => $product->id,
            "name" => $product->Product_Name,
            "quantity" => 1,
            "price" => $product->Product_Price,
            "photo" => $product->Product_Picture
        ];

        session()->put('cart', $cart);
        $cart_number=count(session('cart'));
        return response()->json($cart_number, 200);
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

            session()->flash('clear', 'Product removed successfully');
        }
    }

    public function clearCart()
    {
        Session::forget('cusproductdetail');
        Session::forget('cart');
        Session::forget('orderdetail');
        session()->flash('clear', 'Clear successfully');
    }

    public function confirmCart()
    {
        Session::forget('cusproductdetail');
        return view('customer/confirmOrder');
    }

    public function addOrderDetailList(Request $r)
    {
        $r['order_time'] = date('Y-m-d', time());
        $r->validate([
            'receive_time' => 'required|after:order_time',
        ], [
            'receive_time.required' => 'Time is required.',
            'receive_time.after' => 'The receive date must after order date.',
        ]);
        $id = uniqid();
        $orderdetail = session()->get('orderdetail');
        if (!$orderdetail) {
            $orderdetail = [
                $id => [
                    "order_id" => $id,
                    "message" => $r->message,
                    "total_price" => $r->total_price,
                    "receive_time" => $r->receive_time,
                    "order_time" => $r['order_time'],
                ]
            ];
            session()->put('orderdetail', $orderdetail);
            return redirect()->route('corfirmDetail');
        }

        if ($orderdetail[$r->order_id] = $r->order_id) {
            $orderdetail[$r->order_id] = [
                "order_id" => $r->order_id,
                "message" => $r->message,
                "total_price" => $r->total_price,
                "receive_time" => $r->receive_time,
                "order_time" => $r['order_time'],
            ];
        }

        $orderdetail[$r->order_id] = [
            "order_id" => $r->order_id,
            "message" => $r->message,
            "total_price" => $r->total_price,
            "receive_time" => $r->receive_time,
            "order_time" => $r['order_time'],
        ];

        session()->put('orderdetail', $orderdetail);
        return redirect()->route('corfirmDetail');
    }


    public function confirmDetail(Request $r)
    {
        $r->validate([
            'Customer_Name' => 'required',
            'Customer_Address' => 'required',
            'Customer_Phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:12',
        ], [
            'Customer_Name.required' => 'Name or Campany Name is required.',
            'Customer_Address.required' => 'Address is required.',
            'Customer_Phone.required' => 'Phone Number is required.',
            'Customer_Phone.regex' => 'Phone Number format is invalid.',
            'Customer_Phone.min' => 'Phone Number must be at least 10 characters.',
            'Customer_Phone.max' => 'The Phone Number must not be greater than 12 characters.',
        ]);

        $messages = $r->Customer_Messages;
        if ($messages == "") {
            $messages = "";
        }

        $Order_Product = $r->Order_Product;
        $Order_id = $r->Order_id;
        $Order_Quantity = $r->Order_Quantity;
        $Order_Price = $r->Order_Price;
        $orders_details = DB::table('order_details');
        $id = $r->Customer_order_id;
        $cusdetail = session()->get('cusdetail');
        $cusproductdetail = session()->get('cusproductdetail');

        if (!$cusdetail) {
            $cusdetail = [
                $id => [
                    "name" => $r->Customer_Name,
                    "phone" => $r->Customer_Phone,
                    "address" => $r->Customer_Address,
                    "order_time" => $r->Customer_Order_Day,
                    "receive_time" => $r->Customer_Receive_Day,
                    "message" => $messages,
                    "total_price" => $r->Customer_Total_Price,
                    "product_order_id" => $Order_id,
                ]
            ];
            session()->put('cusdetail', $cusdetail);
        }
        $Order_Product_id = $r->Order_Product_id;
        if (!$cusproductdetail) {
            for ($i = 0; $i < count($Order_Product); $i++) {
                $cusproductdetail[$i] = [
                    'order_product_name' => $Order_Product_id[$i],
                    'product_name' => $Order_Product[$i],
                    'product_quantity' => $Order_Quantity[$i],
                    'product_price' => $Order_Price[$i],
                ];
                session()->put('cusproductdetail', $cusproductdetail);
            }
        }


        $insertOrder = order::create([
            'Customer_order_id' => $r->Customer_order_id,
            'Customer_Name' =>  strtoupper($r->Customer_Name),
            'Customer_Address' => $r->Customer_Address,
            'Customer_Phone' => $r->Customer_Phone,
            "order_time" => $r->Customer_Order_Day,
            'Customer_Order_Day' => $r->Customer_Order_Day,
            'Customer_Receive_Day' => $r->Customer_Receive_Day,
            'Customer_Messages' =>  $messages,
            'Customer_Total_Price' => $r->Customer_Total_Price,
            'Customer_Status' => 1,
        ]);

        for ($i = 0; $i < count($Order_Product); $i++) {
            $database = [
                'Order_IdDetails' => $Order_id,
                'Order_Product' => $Order_Product[$i],
                'Order_Quantity' => $Order_Quantity[$i],
                'Order_Price' => $Order_Price[$i],
            ];
            $orders_details->insert($database);
        }
        Session::forget('cart');
        Session::forget('orderdetail');
        return redirect()->route('getReceipt');
    }

    public function downloadReceipt()
    {
        $pdf = PDF::loadView('customer/Receipt/receipt');
        return $pdf->download('Orders.pdf');
    }

    public function leaveRecaipt()
    {
        Session::forget('cusproductdetail');
        Session::forget('cusdetail');
        return redirect()->route('index');
    }
}
