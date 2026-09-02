<?php

namespace App\Http\Controllers;

use App\Models\Technician;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientDashboardController extends Controller
{
    public function __invoke(Request $request): View
    {
        $technicians = Technician::query()
            ->withCount('ratings')
            ->withAvg('ratings', 'rating')
            ->when($request->filled('search'), function ($query) use ($request): void {
                $search = $request->string('search')->trim()->toString();

                $query->where(function ($query) use ($search): void {
                    $query->where('name', 'like', "%{$search}%")
                        ->orWhere('specialty', 'like', "%{$search}%")
                        ->orWhere('location', 'like', "%{$search}%");
                });
            })
            ->when($request->filled('specialty'), fn ($query) => $query->where('specialty', $request->string('specialty')->toString()))
            ->when($request->filled('location'), fn ($query) => $query->where('location', $request->string('location')->toString()))
            ->when($request->boolean('available'), fn ($query) => $query->where('is_available', true))
            ->when($request->filled('minimum_rating'), fn ($query) => $query->having('ratings_avg_rating', '>=', (float) $request->input('minimum_rating')))
            ->orderByDesc('ratings_avg_rating')
            ->paginate(4)
            ->withQueryString();

        return view('client.dashboard', [
            'technicians' => $technicians,
            'specialties' => Technician::query()->distinct()->orderBy('specialty')->pluck('specialty'),
            'locations' => Technician::query()->whereNotNull('location')->distinct()->orderBy('location')->pluck('location'),
        ]);
    }
}
