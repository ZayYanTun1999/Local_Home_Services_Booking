<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Helpers\ApiResponse;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::with(['category', 'township']);

        if ($request->township_id) {
            $query->where('township_id', $request->township_id);
        }

        if ($request->city_id) {
            $query->whereHas('township', function ($q) use ($request) {
                $q->where('city_id', $request->city_id);
            });
        }

        return response()->json([
            'status' => true,
            'data' => $query->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'city_id' => 'required|exists:cities,id',
            'township_id' => 'required|exists:townships,id',
            'title' => 'required',
            'price' => 'required|numeric'
        ]);

        $service = Service::create($request->all());

        return ApiResponse::success($service, 'Service created');
    }

    public function show($id)
    {
        $service = Service::find($id);

        if (!$service) {
            return ApiResponse::error('Not found', 404);
        }

        return ApiResponse::success($service);
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);

        if (!$service) {
            return ApiResponse::error('Not found', 404);
        }

        $service->update($request->all());

        return ApiResponse::success($service, 'Updated successfully');
    }

    public function destroy($id)
    {
        Service::destroy($id);
        return ApiResponse::success(null, 'Deleted successfully');
    }

    public function byTownship($township_id)
    {
        return ApiResponse::success(
            Service::where('township_id', $township_id)->get()
        );
    }
}