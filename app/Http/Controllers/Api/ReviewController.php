<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(string $userId)
    {
        $reviews = Review::where('user_id', $userId)->orderBy('created_at', 'DESC')->paginate();

        return ReviewResource::collection(
            $reviews
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,_id',
            'product_id' => 'required|exists:products,_id',
            'comment' => 'required|string|min:3|max:1000',
        ]);

        $review = Review::create($data);
        
        return new ReviewResource(
            $review
        );
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'user_id' => 'sometimes|required|exists:users,_id',
            'product_id' => 'sometimes|required|exists:products,_id',
            'comment' => 'sometimes|required|string|min:3|max:1000',
        ]);

        $review = Review::where('_id', $id)->update($data);
        $review = Review::where('_id', $id)->get();
        
        return new ReviewResource(
            $review
        );
    }

    public function destroy(string $id)
    {
        Review::where('_id', $id)->delete();

        return response(status: 204);
    }
}
