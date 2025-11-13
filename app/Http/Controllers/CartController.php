<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Cart;
use App\Models\Product;
use App\Models\orders;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class CartController extends BaseController
{
    // public function cartindex()
    // {
    //     $userId = Auth::id();
    //     $cartItems = Cart::where('user_id', $userId)->with('product')->get();
    //     return view('cartindex', compact('cartItems'));
    // }


    public function cartadd(Request $request)
    {

        $product = Product::find($request->input('product_id'));
        $userId = Auth::id();

        $existingCartItem = Cart::where('product_id', $product->product_id)
            ->where('user_id', $userId)
            ->first();
        if ($existingCartItem) {
            $existingCartItem->quantity += $request->input('quantity');
            $existingCartItem->total_price = $existingCartItem->quantity * $product->product_price;
            $existingCartItem->save();
            return redirect()->back()->with('success', 'Product quantity updated in cart successfully!');
        } else {

            // $request->validate([
            //     'product_id' => 'required|integer|exists:products,product_id',
            //     'user_id'=> 'required|integer|exists:users,id',
            //     'quantity' => 'required|integer|min:1',
            //     'total_price' => 'required|numeric|min:0',
            // ]);

            Cart::create([

                'product_id' => $request->input('product_id'),
                'user_id' => auth()->id(),
                'quantity' => $request->input('quantity'),
                'total_price' => $product->product_price * $request->input('quantity') ?? 0.00,
            ]);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
    }
    public function cartshow()
    {

        $userId = Auth::id();
        // $carts = Cart::all();
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();
        return view('cartlist', compact('cartItems'));
        // return view('cartlist', compact('car'));

    }

    public function cartremove($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->back()->with('success', 'Item removed from cart successfully!');
    }

    public function cartclear()
    {
        $userId = Auth::id();
        Cart::where('user_id', $userId)->delete();

        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }

    public function checkoutshow()
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        return view('checkout');
    }

    //     public function checkout(Request $request)
    //     {  
    //         $userId = Auth::id();
    //         $cartItems = Cart::where('user_id', $userId)->with('product')->get();
    //         $totalprice = $cartItems->sum('total_price');


    //         $request->validate(
    //             [
    //                 'user_name' => 'required|string|max:20',
    //                 'user_email' => 'required|string|max:255',
    //                 'user_phone_number' => 'required|string|max:255',
    //                 'payment_mode' => 'required',
    //             ]

    //         );

    //         foreach ($cartItems as $items)
    //             orders::create([
    //                 'user_name' => $request->input('user_name'),
    //                 'user_email' => $request->input('user_email'),
    //                 'user_phone_number' => $request->input('user_phone_number'),
    //                 'payment_mode' => $request->input('payment_mode'),
    //                 'user_id' => $userId,
    //                 'product_name' => $items->product->product_name,
    //                 'quantity' => $items->quantity,
    //                 'order_status' => 'Pending', // Default status
    //                 'total_price' => $totalprice,
    //             ]);
    //         Cart::where('user_id', $userId)->delete();
    //         return redirect('checkout.success');
    // // return view('dashboard');    }
    //         }


    // return view('checkout', compact('cartItems')

    public function checkout(Request $request)
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();
        $totalprice = $cartItems->sum('total_price');

        $request->validate(
            [
                'name' => 'required|string',
                'email' => 'required|string',
                'phone_number' => 'required|string',
                'payment_mode' => 'required',
            ]
        );

        foreach ($cartItems as $items) {
            orders::create([
                'user_id' => $userId,
                'user_name' => $request->input('name'),
                'user_email' => $request->input('email'),
                'user_phone_number' => $request->input('phone_number'),
                'payment_mode' => $request->input('payment_mode'),
                'product_name' => $items->product->product_name,
                'quantity' => $items->quantity,
                'order_status' => 'Pending', // Default status
                'total_price' => $totalprice,
            ]);
        }

        Mail::to($request->input('email'))->queue(new WelcomeMail($request->name));

        Cart::where('user_id', $userId)->delete();
        return redirect()->route('checkout.index')->with('checkoutsuccess', 'Your Order is confirmed');
    }

    public function Cartcount()
    {
        $count = 0;
        if (Auth::check()) {
            $count = Cart::where('user_id', Auth::id())->count();
        }
        return response()->json(['count' => $count]);
    }

    public function success()
    {
        return view('successmessage');
    }
}
