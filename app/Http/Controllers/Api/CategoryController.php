<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $cats = Category::paginate();

        return CategoryResource::collection(
            $cats
        );
    }

    public function store(Request $request)
    {
        $category = $request->validate([
            'name' => 'required|string|max:100',
            'des' => 'string|min:10',
            'meta_title' => 'required|string|max:100',
            'meta_keyword' => 'string|max:200',
            'meta_des' => 'string|max:200',
        ]);

        $category = Category::create($category);

        return new CategoryResource(
            $category
        );
    }

    public function show(String $id)
    {
        $category = Category::where('_id', $id)->get();
        
        return new CategoryResource(
            $category
        );
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:100',
            'des' => 'string|min:10',
            'meta_title' => 'sometimes|required|string|max:100',
            'meta_keyword' => 'string|max:200',
            'meta_des' => 'string|max:200',
        ]);

        $category = Category::where('_id', $id)->update($data);
        $category = Category::where('_id', $id)->get();

        return new CategoryResource(
            $category
        );

        
    }

    public function destroy(string $id)
    {
        $category = Category::where('_id', $id)->delete();

        return response(status: 204);
    }
}
