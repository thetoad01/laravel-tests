<?php

namespace App\Http\Controllers\Tests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
// Models
use App\Models\Scrape\Vehicle;

class MysqlVehicleController extends Controller
{
    public function index()
    {
        $vehicle = DB::connection('sqlite')->table('vehicles')->inRandomOrder()->first();

        dd($vehicle);
    }

    public function move()
    {
        $vehicle = DB::connection('sqlite')->table('vehicles')
            ->where('created_at', 'like', '2020-05%')
            ->inRandomOrder()
            ->first();

        // dd($vehicle);

        $mysql = Vehicle::updateOrInsert(
            [
                'url' => $vehicle->url,
                'vin' => $vehicle->vin,
                'stock_number' => $vehicle->stock_number
            ],
            [
                'dealer' => $vehicle->dealer,
                'year' => $vehicle->year,
                'make' => $vehicle->make,
                'model' => $vehicle->model,
                'trim' => $vehicle->trim,
                'exterior_color' => $vehicle->exterior_color,
                'interior_color' => $vehicle->interior_color,
                'deleted_at' => $vehicle->deleted_at,
                'created_at' => $vehicle->created_at,
                'updated_at' => now()->toDateTimeString(),
            ]
        );

        return response()->json([
            'vehicle' => $mysql->latest()->first(),
        ]);
    }

    public function moveCdkLink()
    {
        $link = DB::connection('sqlite')->table('cdk_links')
            ->where('created_at', 'like', '2020-01%')
            ->where('http_response_code', 200)
            ->inRandomOrder()
            ->first();

        // dd($link);

        $data = \App\Models\Scrape\CdkLink::updateOrInsert(
            [
                'vdp_url' => $link->vdp_url,
            ],
            [
                'visited' => $link->visited,
                'http_response_code' => $link->http_response_code,
                'created_at' => $link->created_at,
                'updated_at' => $link->updated_at,
            ]
        );

        $output = \App\Models\Scrape\CdkLink::where('vdp_url', $link->vdp_url)->first();

        return $output;
    }
}
