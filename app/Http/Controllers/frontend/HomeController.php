<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    // public function HomeView()
    // {
    //     $products   = Product::where('is_deleted','<>',1)->get();
    //     $categories = Category::where('is_deleted','<>',1)->get();
    //     return view('frontend.dashboard',compact('products','categories'));
    // }

    // public function HomeProductDetails($id){

    //     $product = Product::findOrFail($id);
    //     return response()->json($product);
    // }
}
