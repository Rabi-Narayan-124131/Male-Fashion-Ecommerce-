<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Stripe;

class StripePaymentController extends Controller
{


    public function stripe(Request $request)
    {
        if (Auth::id()) {
            $bill = $request->bill;
            $name = $request->name;
            $phone = $request->phone;
            $address = $request->address;
            // $status = 'Paid';
            // $userId = Auth::id();
            return view('home.stripe', compact('bill', 'name', 'phone', 'address'));
        } else {
            return redirect('/signin');
        }
    }


    public function stripePost(Request $request)
    {
        if ($request->bill <= 0) {
            // Redirect back with an error message
            Alert::warning('Payment Unsuccessful!', 'You must add something to the cart to make a payment.');
            return redirect()->back()->with('message', 'The total price must be greater than 0 to make a payment.');
        } else {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            Stripe\Charge::create([
                "amount" => $request->bill * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test Payment Received from Male-Fashion"
            ]);

            if (Auth::id()) {

                $order = new Order();
                $order->userId = Auth::id();
                $order->bill = $request->bill;
                $order->name = $request->name;
                $order->phone = $request->phone;
                $order->address = $request->address;
                $order->status = 'Paid';

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
                    Alert::error('Something went wrong', 'Try again!');
                }
                Session::flash('success', 'Payment successful!');
                Alert::success('Your Order has been placed Successfully', 'Thank You!');
                return redirect('/');
            } else {
                Alert::error('Please Sign In First', 'Go to Sign In!');
                return redirect('/signin');
            }
        }
    }
}
