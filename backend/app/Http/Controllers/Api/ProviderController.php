<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
    /**
     * GET /api/providers
     * Filters:
     * ?city_id=
     * ?township_id=
     * ?service_id=
     */
    public function index(Request $request)
    {
        $query = User::with(['township.city', 'services'])
        ->where('role', 'service_provider')
        ->where('status', 'active')
        ->withAvg('reviews as avg_rating', 'rating')
        ->withCount('reviews');

        // FILTER: service
        if ($request->filled('service_id')) {
            $serviceId = $request->service_id;

            $query->whereHas('services', function ($q) use ($serviceId) {
                $q->where('services.id', $serviceId);
            });

            // optional: show only matched service in relation
            $query->with(['services' => function ($q) use ($serviceId) {
                $q->where('services.id', $serviceId);
            }]);
        }

        // FILTER: city (optional but useful)
        if ($request->filled('city_id')) {
            $cityId = $request->city_id;

            $query->whereHas('township', function ($q) use ($cityId) {
                $q->where('city_id', $cityId);
            });
        }

        // ⭐ RANKING (must be after filters)
        $query->orderByDesc('avg_rating')
            ->orderByDesc('reviews_count');

        $providers = $query->get();

        // FINAL TRANSFORM RESPONSE
        $data = $providers->map(function ($p) {
            return [
                'id' => $p->id,
                'name' => $p->name,
                'phone' => $p->phone,
                'avg_rating' => round($p->avg_rating ?? 0, 1),
                'review_count' => $p->reviews_count,

                'township' => $p->township->name ?? null,
                'city' => $p->township->city->name ?? null,

                'services' => $p->services->map(function ($s) {
                    return [
                        'id' => $s->id,
                        'title' => $s->title,
                        'price' => $s->price
                    ];
                })->values()
            ];
        });

        return response()->json([
            'status' => true,
            'message' => 'Provider list',
            'data' => $data
        ]);
    }

    /**
     * GET /api/providers/{id}
     */
    public function show($id)
    {
        $provider = User::with([
                'township.city',
                'services',
                'serviceAreas'
            ])
            ->where('role', 'service_provider')
            ->find($id);

        if (!$provider) {
            return response()->json([
                'status' => false,
                'message' => 'Provider not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Provider detail',
            'data' => $provider
        ]);
    }

    /**
     * GET /api/providers/{id}/services
     */
    public function services($id)
    {
        $provider = User::where('role', 'service_provider')->find($id);

        if (!$provider) {
            return response()->json([
                'status' => false,
                'message' => 'Provider not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $provider->services
        ]);
    }

    /**
     * GET /api/providers/{id}/areas
     */
    public function areas($id)
    {
        $provider = User::where('role', 'service_provider')->find($id);

        if (!$provider) {
            return response()->json([
                'status' => false,
                'message' => 'Provider not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $provider->serviceAreas
        ]);
    }
}