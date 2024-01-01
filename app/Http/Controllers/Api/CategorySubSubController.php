<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategorySubSubResource;
use App\Models\CategorySubSub;
use Illuminate\Http\Request;

class CategorySubSubController extends Controller
{
    public function index()
    {
        $cats = CategorySubSub::with('categorysub')->paginate();
        
        return CategorySubSubResource::collection(
            $cats
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:100',
            'category_sub_id' => 'exists:category_subs,_id',
            'is_active' => 'boolean',
        ]);

        $cat = CategorySubSub::create($data);
        $cat->load('categorysub');

        return new CategorySubSubResource(
            $cat
        );

    }

    public function show(String $id)
    {
        $cat = CategorySubSub::where('_id', $id)->with('categorysub')->get();

        return new CategorySubSubResource(
            $cat
        );
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|min:3|max:100',
            'category_sub_id' => 'sometimes|exists:category_subs,_id',
            'is_active' => 'sometimes|boolean',
        ]);

        $cat = CategorySubSub::where('_id', $id)->update($data);
        $cat = CategorySubSub::where('_id', $id)->with('categorysub')->get();

        return new CategorySubSubResource(
            $cat
        );
    }

    public function destroy(string $id)
    {
        CategorySubSub::where('_id', $id)->delete();

        return response(status:204);
    }
}
