<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategorySubResource;
use App\Models\Category;
use App\Models\CategorySub;
use Illuminate\Http\Request;

class CategorySubController extends Controller
{
    public function index()
    {
        $cats_sub = CategorySub::paginate();

        return CategorySubResource::collection(
            $cats_sub
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:2|max:100',
            'category_id' => 'required|exists:categories,_id',
            'is_active' => 'boolean',
        ]);

        $cat_sub = CategorySub::create($data);

        return new CategorySubResource(
            $cat_sub
        );

    }

    public function show(String $id)
    {
        $cat_sub = CategorySub::where('_id', $id)->get();
        return new CategorySubResource(
            $cat_sub
        );  
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|min:2|max:100',
            'category_id' => 'sometimes|required|exists:category,_id',
            'is_active' => 'boolean',
        ]);

        $cat_sub = CategorySub::where('_id', $id)->update($data);
        $cat_sub = CategorySub::where('_id', $id)->get();

        return new CategorySubResource(
            $cat_sub
        );

    }

    public function destroy(string $id)
    {
        CategorySub::where('_id', $id)->delete();

        return response(status: 204);
    }
}
