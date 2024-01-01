<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('user')->with('brand')->with('category')->paginate();
        return ProductResource::collection(
            $products
        );
    }

    public function store(Request $request)
    {
        $product = $request->validate([
            'name' => 'required|string|min:3|max:255',
            'thumb_link' => 'required|string',
            'price' => 'required|numeric|min:0.01|max:10000000',
            'des' => 'required|min:10|max:10000',
            'user_id' => 'required|exists:users,_id',
            'category_id' => 'exists:categories,_id',
            'brand_id' => 'exists:brands,_id',
        ]);

        $product = Product::create($product);

        return new ProductResource(
            $product
        );
    }

    public function show(String $id)
    {
        $product = Product::where('_id', $id)->with('user')->with('brand')->with('category')->get();
        return ProductResource::collection(
            $product
        );   
    }

    public function update(Request $request, String $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|min:3|max:255',
            'thumb_link' => 'sometimes|required|string',
            'price' => 'sometimes|required|numeric|min:0.01|max:10000000',
            'des' => 'sometimes|required|min:10|max:10000',
            'category_id' => 'sometimes|exists:categories,_id',
            'category_sub_id' => 'sometimes|exists:category_subs,_id',
            'category_sub_sub_id' => 'sometimes|exists:category_sub_subs,_id',
            'brand_id' => 'sometimes|exists:brands,_id',
        ]);

        $product = Product::where('_id', $id)->update($data);
        $product = Product::where('_id', $id)->with('user')->with('brand')->with('category')->get();
        
        return new ProductResource(
            $product
        );

    }

    public function destroy(String $id)
    {
        $product = Product::where('_id', $id)->delete();

        return response(status: 204);
    }
}
