<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Models
use App\Models\Scrape\Vehicle;
use Illuminate\Support\Facades\DB;

class VehicleStatsController extends Controller
{
    public function index()
    {
        $vehicleMakes = Vehicle::select('make as name', DB::raw('count(*) as y'))
            ->whereNull('deleted_at')
            ->groupBy('make')
            ->get();

        return view('vehicle-stats.index', [
            'total' => $vehicleMakes->pluck('y')->sum(),
            'data' => $vehicleMakes->toJson(),
        ]);
    }
}
