<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use Auth;
use App\Product;
use Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $array = array();
        // Session::forget('cart');
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
            foreach ($cart as $data) {
                $array[] = array("id" => $data->id, "product" => $data->product->name, "varian" => $data->product->varian, "qty" => $data->qty, "image" => $data->product->image);
            }
        } else {
            if (Session::has('cart')) {
                // $array[] = Session::get('cart');
                foreach (Session('cart') as $cart) {
                    $array[] = array("id" => $cart->id, "product" => $cart->name, "varian" => $cart->varian, "qty" => $cart->qty, "image" => $cart->image);
                }
            }
        }
        return response()->json($array);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = $request->input("user_id");
        $product_id = $request->input("product_id");
        if (Auth::check()) {
            // get Cart that has same user and product input and get only the id
            $cart = Cart::where('user_id', $user)->where('product_id', $product_id)->first();
            if ($cart) {
                // Update input qty
                $cart->qty = $cart->qty + 1;
                $product = $cart->product_id;
            } else {
                // Input new Cart
                $cart = new Cart;
                $cart->user_id = $user;
                $product = $cart->product_id = $product_id;
                $cart->qty = 1;
            }
            $cart->save();
        } else {
            // Still Error
            $Product = Product::find($product_id);
            if (Session::has('cart')) {
                foreach (Session::get('cart') as $cart) {
                    if ($Product->id == $cart->id) {
                        $cart->qty++;
                        $product = $Product->id;
                        return response()->json();
                    }
                }
                $Product->qty = 1;
                $product = $Product->id;
                Session::push('cart', $Product);
            } else {
                Session::put('cart', []);
                $Product->qty = 1;
                $product = $Product->id;
                Session::push('cart', $Product);
            }
        }
        $array = array("product_id" => $product);
        return response()->json($array);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $cart = Cart::find($id);
            $cart->delete();
        } else {
            foreach (Session::get('cart') as $key => $value) {
                if ($value->id == $id) {
                    session()->forget('cart.' . $key);
                }
            }
        }
    }
}
