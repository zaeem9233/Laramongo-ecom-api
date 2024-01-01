<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ColourResource;
use App\Models\Colour;
use Illuminate\Http\Request;

class ColourController extends Controller
{
    public function index()
    {
        $colours = Colour::paginate();

        return ColourResource::collection(
            $colours
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:3|max:50',
            'code' => 'required|string|min:6|max:50',
            'code_type' => 'required|string|max:20',
        ]);

        $colour = Colour::create($data);

        return new ColourResource(
            $colour
        );
    }

    public function show(Colour $colour)
    {
        return new ColourResource(
            $colour  
        );
    }

    public function update(Request $request, String $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|min:3|max:50',
            'code' => 'sometimes|required|string|min:6|max:50',
            'code_type' => 'sometimes|required|string|max:20',
        ]);

        $colour = Colour::where('_id', $id)->update($data);
        $colour = Colour::where('_id', $id)->get();

        return new ColourResource(
            $colour
        );
    }

    public function destroy(string $id)
    {
        Colour::where('_id', $id)->delete();

        return response(status: 204);
    }
}
