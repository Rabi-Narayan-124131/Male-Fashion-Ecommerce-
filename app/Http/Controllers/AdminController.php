<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {

        if (Auth::id()) {
            $userType = Auth()->user()->user_type;
            if ($userType == 'User') {
                $allTypes = explode(',', 'Best Sellers,New Arrivals,Hot Sales');
                $productType = array_fill_keys($allTypes, []);
                foreach ($allTypes as $type) {
                    $productType[$type] = Product::where('type', $type)
                        ->orWhere('type', 'like', $type . ',%')
                        ->get();
                }
                return view('home.index', compact('productType'));
            } elseif ($userType == 'Admin') {
                return view('admin.index');
            }
        } else {
            return redirect()->back();
        }
    }

    public function profile()
    {

        if (Auth::id()) {
            $userType = Auth()->user()->user_type;
            if ($userType == 'User') {

                return view('home.profile_info');
            } elseif ($userType == 'Admin') {
                return view('home.profile_info');
            }
        } else {
            return redirect()->back();
        }
    }


    //=================================================================================

    public function product_view()
    {
        $products = Product::all();
        return view('admin.product', compact('products'));
    }

    public function customer_view()
    {
        $customers = User::where('user_type', 'User')->get();
        return view('admin.customer', compact('customers'));
    }

    public function order_view()
    {
        $orderItems = DB::table('order_items')->join('products', 'order_items.productId', 'products.id')->select('products.title', 'products.image', 'order_items.*')->get();
        $orders = DB::table('users')->join('orders', 'orders.userId', 'users.id')->select('orders.*', 'users.name', 'users.email', 'users.status as userStatus')->get();
        return view('admin.orders', compact('orders', 'orderItems'));
    }
    public function add_product(Request $request)
    {
        $product = new Product;

        $image = $request->image;
        if ($image) {
            $imageName = time() . '-rabi.' . $image->extension();
            $request->image->move('admin/product', $imageName);
            $product->image = $imageName;
        }
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->category = $request->input('category');
        $product->type = $request['type'] = implode(',', $request->type);

        $product->description = $request->input('description');

        $product->save();
        Alert::success('New Product Added Successfully', 'Go to view all!');
        return redirect()->back();
    }
    public function product_details($id)
    {
        $products = Product::find($id);
        return view('admin.update_product', compact('products'));
    }
    public function update_product(Request $request, $id)
    {
        $product = Product::find($id);
        // dd($product);
        $image = $request->image;
        if ($image) {
            $imageName = time() . '-rabi.' . $image->extension();
            $request->image->move('admin/product', $imageName);
            $product->image = $imageName;
        }
        $product->title = $request->input('title');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');
        $product->category = $request->input('category');
        $product->type = $request['type'] = implode(',', $request->type);

        $product->description = $request->input('description');

        $product->save();
        Alert::success('The Product Updated Successfully', 'Go to view all!');
        return redirect('product');
    }
    public function delete_product($id)
    {
        $product = Product::find($id);
        $product->delete();
        Alert::success();
        return redirect()->back();
    }
    public function user_status($status, $id)
    {
        $user = User::find($id);
        $user->status = $status;
        $user->save();
        Alert::success('Status Updated Successfully', 'Go to view all!');
        return redirect()->back();
    }
    public function order_status($status, $id)
    {
        $order = Order::find($id);
        $order->status = $status;
        $order->save();
        Alert::success('Status Updated Successfully', 'Go to view all!');
        return redirect()->back();
    }
}
