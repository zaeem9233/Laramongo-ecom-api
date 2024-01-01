<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\WishlistResource;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index(string $userId)
    {
        $wishlist = Wishlist::where('user_id', $userId)->paginate();
        
        return WishlistResource::collection(
            $wishlist
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,_id',
            'product_id' => 'required|exists:products,_id'
        ]);

        $wishlist = Wishlist::create($data);

        return new WishlistResource(
            $wishlist
        );
    }

    public function destroy(string $id)
    {
        Wishlist::where('_id', $id)->delete();

        return response(status: 204);
    }
}
