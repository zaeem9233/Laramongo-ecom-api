<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CoupenResource;
use App\Models\Coupen;
use Illuminate\Http\Request;

class CoupenController extends Controller
{

    public function index()
    {
        $coupens = Coupen::paginate();
        return CoupenResource::collection(
            $coupens
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:100',
            'is_percent' => 'boolean',
            'discount' => 'required|numeric',
            'is_active' => 'boolean',
        ]);

        $coupen = Coupen::create($data);

        return new CoupenResource(
            $coupen
        );
    }

    public function show(Coupen $coupen)
    {
        return new CoupenResource(
            $coupen
        );
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|min:3|max:100',
            'is_percent' => 'boolean',
            'discount' => 'sometimes|required|numeric',
            'is_active' => 'boolean',
        ]);

        $coupen = Coupen::where('_id', $id)->update($data);
        $coupen = Coupen::where('_id', $id)->get();

        return new CoupenResource(
            $coupen
        );
    }

    public function destroy(string $id)
    {
        Coupen::where('_id', $id)->delete();

        return response(status: 204);
    }
}
