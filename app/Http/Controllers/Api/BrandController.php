<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate();

        return BrandResource::collection(
            $brands
        );
    }

    public function store(Request $request)
    {
        $brand = $request->validate([
            'name' => 'required|string|min:2|max:200',
            'category_id' => 'exists:categories,_id',
        ]);

        $brand = Brand::create($brand);

        return new BrandResource(
            $brand
        );

    }

    public function show(Brand $brand)
    {
        return new BrandResource(
            $brand
        );
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|min:2|max:200',
            'category_id' => 'exists:categories,_id',
        ]);

        $brand = Brand::where('_id', $id)->update($data);
        $brand = Brand::where('_id', $id)->get();

        return new BrandResource(
            $brand
        );
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return response(status: 204);
    }
}
