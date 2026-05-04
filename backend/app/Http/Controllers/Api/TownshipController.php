<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Township;
use App\Helpers\ApiResponse;

class TownshipController extends Controller
{
    // GET all townships
    public function index()
    {
        $townships = Township::all();
        return ApiResponse::success($townships);
    }

    // CREATE township
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'city_id' => 'required|exists:cities,id'
        ]);

        $township = Township::create([
            'name' => $request->name,
            'city_id' => $request->city_id
        ]);

        return ApiResponse::success($township, 'Township created', 201);
    }

    // SHOW single township
    public function show($id)
    {
        $township = Township::find($id);

        if (!$township) {
            return ApiResponse::error('Township not found', 404);
        }

        return ApiResponse::success($township);
    }

    // UPDATE township
    public function update(Request $request, $id)
    {
        $township = Township::find($id);

        if (!$township) {
            return ApiResponse::error('Township not found', 404);
        }

        $township->update([
            'name' => $request->name ?? $township->name,
            'city_id' => $request->city_id ?? $township->city_id
        ]);

        return ApiResponse::success($township, 'Township updated');
    }

    // DELETE township
    public function destroy($id)
    {
        $township = Township::find($id);

        if (!$township) {
            return ApiResponse::error('Township not found', 404);
        }

        $township->delete();

        return ApiResponse::success(null, 'Township deleted');
    }

    // GET by city
    public function byCity($city_id)
    {
        $townships = Township::where('city_id', $city_id)->get();

        return ApiResponse::success($townships);
    }
}