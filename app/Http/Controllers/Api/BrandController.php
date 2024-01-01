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
        $brands = Brand::get();

        return BrandResource::collection(
            $brands->paginate()
        );
    }

    public function store(Request $request)
    {
        
    }

    public function show(Brand $brand)
    {
        // $brand = Brand::where('_id', $id)->get();

        return new BrandResource(
            $brand
        );
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return response(status: 204);
    }
}
