<?php

namespace App\Http\Controllers;

use App\Mail\Testing;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {

        $allTypes = explode(',', 'Best Sellers,New Arrivals,Hot Sales');
        $productType = array_fill_keys($allTypes, []);
        foreach ($allTypes as $type) {
            $productType[$type] = Product::where('type', $type)
                ->orWhere('type', 'like', $type . ',%')
                ->get();
        }
        return view('home.index', compact('productType'));
    }
    public function about()
    {
        return view('home.about');
    }
    public function contact()
    {
        return view('home.contact');
    }
    public function shop()
    {
        return view('home.shop');
    }
    public function product_details($id)
    {
        $product = Product::find($id);
        return view('home.product-details', compact('product'));
    }
    public function add_to_cart(Request  $request)
    {
        if (Auth::id()) {
            $cartItem = new Cart();
            $cartItem->quantity = $request->quantity;
            $cartItem->productId = $request->id;
            $cartItem->userId = Auth::id();

            $cartItem->save();
            Alert::success('Product Added To The Cart Successfully', 'Go to Checkout!');
            return redirect()->back();
        } else {
            Alert::error('Please Sign In First', 'Go to Sign In!');
            return redirect('/signin');
        }
    }
    public function cart()
    {
        $cartItems = DB::table('products')->join('carts', 'carts.productId', '=', 'products.id')
            ->select('products.title', 'products.price', 'products.quantity as pQuantity', 'products.image', 'carts.*')->where('carts.userId', Auth::id())->get();
        // dd($cartItems);
        return view('home.cart', compact('cartItems'));
    }
    public function delete_cart_item($id)
    {
        $product = Cart::find($id);
        $product->delete();
        Alert::success();
        return redirect()->back();
    }
    public function update_cart(Request  $request, $id)
    {
        if (Auth::id()) {
            $cartItem = Cart::find($id);
            $cartItem->quantity = $request->quantity;

            $cartItem->save();
            Alert::info('Cart Updated Successfully', 'Go to Checkout!');
            return redirect()->back();
        } else {
            Alert::error('Please Sign In First', 'Go to Sign In!');
            return redirect('/signin');
        }
    }

    public function checkout(Request $request)
    {
        if (Auth::id()) {

            $order = new Order();
            $order->userId = Auth::id();
            $order->bill = $request->bill;
            $order->name = $request->name;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->status = 'Pending';

            if ($order->save()) {
                $cart = Cart::where('userId', Auth::id())->get();
                foreach ($cart as $item) {

                    $product = Product::find($item->productId);
                    $orderItem = new OrderItem();
                    $orderItem->productId = $item->productId;
                    $orderItem->quantity = $item->quantity;
                    $orderItem->price = $product->price;
                    $orderItem->orderId = $order->id;
                    $orderItem->save();
                    $item->delete();
                }
            } else {
                Alert::error('Somthimg went wrong', 'submit form again!');
            }
            Alert::success('Your Order has been placed Successfully', 'Thank You!');
            return redirect()->back();
        } else {
            Alert::error('Please Sign In First', 'Go to Sign In!');
            return redirect('/signin');
        }
    }
    public function my_order()
    {
        if (Auth::id()) {
            $orders = Order::where('userId', Auth::id())->get();
            $items = DB::table('products')->join('order_items', 'order_items.productId', 'products.id')->select('products.title', 'products.image', 'order_items.*')->get();
            return view('home.order', compact('orders', 'items'));;
        } else {
            return view('home.signin');
        }
    }

    public function testMail()
    {
        if (Auth::id()) {
            $details = [
                'title' => 'Testing Mail From Male-Fashion',
                'message' => 'This is for testing email'
            ];
            // Mail::to(Auth::user()->email)->send(new Testing($details));
            Mail::to("coolrabi9583@gmail.com")->send(new Testing($details));
            Alert::success('Mail Sent Successfully To Your Mail', 'Kindly Check Your Mail, Thank You!');
            return redirect()->route('index');
        } else {
            return view('home.signin');
        }
    }
    public function signin()
    {
        if (Auth::id()) {
            return redirect()->route('index');
        } else {
            return view('home.signin');
        }
    }
    public function signup()
    {
        if (Auth::id()) {
            return redirect()->route('index');
        } else {
            return view('home.signup');
        }
    }
    public function forgot_pass()
    {
        if (Auth::id()) {
            return redirect()->route('index');
        } else {
            return view('home.forgot_pass');
        }
    }
}
