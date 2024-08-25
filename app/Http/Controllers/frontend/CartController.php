<?php

namespace App\Http\Controllers\frontend;

use App\Models\cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;
use Exception;

class CartController extends Controller
{
    public function AddToCart(Request $request) {









    $product_id  = $request->input('product_id');
    $product_qty = $request->input('product_qty');

if(Auth::check()){

    $prod_check = Product::where('id', $product_id)->first();

    $cart = session()->get('cart', []);

    if($prod_check){


        if(cart::where('prod_id', $product_id)->where('user_id',Auth::id())->exists()) {
            return response()->json(['status' => $prod_check->product_name.'Already Added to cart']);

        }
        else {

            $cartitem = new cart();

            $cart[$product_id ] =  [

            $cartitem->prod_id = $product_id,
            $cartitem->user_id = Auth::id(),
            $cartitem->prod_qty = $product_qty,

            ];
            $cartitem->save();

            session()->put('cart',  $cart);


            return response()->json(['status' => $prod_check->product_name.'Added to cart', 'cart' => $cartitem ]);



        }


    }

}
else{

    return response()->json(['status' => "Login to continue"]);
}

    }

    public function CartCount(){
          $cartcount = cart::where('user_id',Auth::id())->count();
          return response()->json(['count' => $cartcount]);
    }




}
