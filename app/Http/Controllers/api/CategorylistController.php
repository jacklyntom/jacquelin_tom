<?php

namespace App\Http\Controllers\api;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorylistController extends Controller
{
    public function CategoryList()
    {
        $categories = Category::where('is_deleted', '<>', 1)->get();

        return response()->json($categories);

    }

    public function ProductList()
    {
        $category_id = Request()->category_id;

        if($category_id != NULL) {
        $products    = Product::where('is_deleted', '<>', 1)->where('category_id',$category_id)->get();

        return response()->json($products);
        }
        else {

            return response()->json(['response' => 'failed']);

        }


    }


}
