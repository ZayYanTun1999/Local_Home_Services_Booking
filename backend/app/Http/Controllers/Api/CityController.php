<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Helpers\ApiResponse;

class CityController extends Controller
{
    // GET /api/cities
    public function index()
    {
        $cities = DB::table('cities')->get();
        return ApiResponse::success($cities);
    }

    // POST /api/cities
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:cities,name'
        ]);

        $id = DB::table('cities')->insertGetId([
            'name' => $request->name,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return ApiResponse::success(
            ['id' => $id],
            'City created',
            201
        );
    }

    // GET /api/cities/{id}
    public function show($id)
    {
        $city = DB::table('cities')->where('id', $id)->first();

        if (!$city) {
            return ApiResponse::error('City not found', 404);
        }

        return ApiResponse::success($city);
    }

    // PUT /api/cities/{id}
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        $updated = DB::table('cities')->where('id', $id)->update([
            'name' => $request->name,
            'updated_at' => now()
        ]);

        if (!$updated) {
            return ApiResponse::error('City not found or not updated', 404);
        }

        return ApiResponse::success(null, 'City updated');
    }

    // DELETE /api/cities/{id}
    public function destroy($id)
    {
        $deleted = DB::table('cities')->where('id', $id)->delete();

        if (!$deleted) {
            return ApiResponse::error('City not found', 404);
        }

        return ApiResponse::success(null, 'City deleted');
    }
}