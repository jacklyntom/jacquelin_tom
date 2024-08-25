<?php
namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AllProduct()
    {
        $products = Product::where('is_deleted', '<>', 1)->get();
        return view('backend.product.all_product', compact('products'));
    }


    public function AddProduct()
    {
        $category = Category::where('is_deleted', '<>', 1)->get();
        return view('backend.product.add_product', compact('category'));
    }

    public function StoreProduct(Request $request)
    {
        if ($request->file('gallery') != null) {
            $file       = $request->file('gallery');
            $filename   = $file->getClientOriginalName();
            $request->gallery->move(public_path('backend/image/product'), $filename);
            $path       = "public/backend/image/product/$filename";
        } else {
            $filename   = "";
        }

        Product::insert([

            'category_id'          => $request->category_id,
            'product_name'         => $request->product_name,
            'gallery'              => $filename ?? "",
            'is_active'            => $request->is_active,
        ]);

        return redirect()->route('product.all')->with('success', 'New Product added');
    }

    public function EditProduct(Request $request)
    {
        $id                = $request->id;

        $product           = Product::findOrFail($id);
        $category_id       = $product->category_id;


        $category          = Category::where('is_deleted', '<>', 1)->get();

        return view('backend.product.edit_product', compact('category','product', ));
    }

    public function UpdateProduct(Request $request, $id)

    {
        $id        = $request->id;
        $product  = Product::findOrFail($id);
        if ($request->file('gallery') != null) {

            $imagePath = public_path('backend/image/product/' . $product->gallery);

            if ($product->gallery != null) {
                unlink($imagePath);
            }

            $file       = $request->file('gallery');
            $filename   = $file->getClientOriginalName();
            $request->gallery->move(public_path('backend/image/product'), $filename);
            $path       = "public/backend/image/product/$filename";
        }

        $image  = Product::where('id', $id)->pluck('gallery')->first();

        Product::findOrFail($id)->update([

            'category_id'          => $request->category_id,
            'product_name'         => $request->product_name,
            'gallery'              => $filename ?? $image,
            'is_active'            => $request->is_active,
        ]);

        return redirect()->route('product.all')->with('success', 'Product updated');
    }

    public function DeleteProduct($id)
    {
        Product::findOrFail($id)->update([

            'is_deleted'   => 1,
        ]);

        return redirect()->back()->with('success', 'Product Removed');
    }
}
