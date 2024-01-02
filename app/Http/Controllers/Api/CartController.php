<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function index(String $userId)
    {
        $cart = Cart::where('user_id', $userId)->with('product')->paginate();

        return CartResource::collection(
            $cart
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,_id',
            'product_id' => 'required|exists:products,_id',
            'quantity' => 'integer|min:1|max:20',
        ]);

        $cart = Cart::create($data);
        $cart->load('product');

        return new CartResource(
            $cart
        );
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'user_id' => 'sometimes|required|exists:users,_id',
            'product_id' => 'sometimes|required|exists:products,_id',
            'quantity' => 'sometimes|integer|min:1|max:20',
        ]);

        $cart = Cart::where('_id', $id)->update($data);
        $cart = Cart::where('_id', $id)->with('product')->get();

        return new CartResource(
            $cart
        );
    }

    public function destroy(string $id)
    {
        Cart::where('_id', $id)->delete();

        return response(status: 204);
    }
}
