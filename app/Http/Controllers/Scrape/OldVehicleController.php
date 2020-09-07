<?php

namespace App\Http\Controllers\Scrape;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scrape\Vehicle;
use Illuminate\Support\Facades\Http;

class OldVehicleController extends Controller
{
    public function index()
    {
        $vehicles = Vehicle::whereNull('deleted_at')
            ->orderBy('updated_at')
            ->take(15)
            ->get();

        return view('old-vehicles.index', [
            'vehicles' => $vehicles,
        ]);
    }

    public function show($id)
    {
        $status = 200;
        $vehicle = Vehicle::where('id', $id)
            ->with('cdkLink')
            ->first();

        // test VDP url
        $response = Http::withOptions([
            'allow_redirects' => false,
        ])->get($vehicle->cdkLink->vdp_url);

        $status = $response->status();

        // record that the vehicle url was visited
        if ($status !== 200) {
            $vehicle->deleted_at = now()->toDateTimeString();
            $vehicle->save();
        } else {
            $vehicle->updated_at = now()->toDateTimeString();
            $vehicle->save();
        }

        // update cdkLink
        $vehicle->cdkLink->visited = 1;
        $vehicle->cdkLink->http_response_code = $status;
        $vehicle->cdkLink->updated_at = now()->toDateTimeString();
        $vehicle->cdkLink->save();

        return back()->with('message','The URL for ' . $vehicle->vin . ' returned status ' . $status);
    }

    /**
     * Test putting x number of urls on the queue to check http status
     */
    public function queuetest()
    {
        $vehicles = Vehicle::whereNull('deleted_at')
            ->whereDate('updated_at', 'not like', now()->toDateString())
            // ->with('cdkLink')
            // ->oldest()
            ->inRandomOrder()
            ->take(15)
            ->get();

        // dd($vehicles);

        $output = [];
        foreach ($vehicles as $vehicle) {
            // dd($vehicle->url);        
            $output[] = dispatch(
                new \App\Jobs\CheckLinkStatusJob($vehicle->url)
            );
        }

        dd($output);
    }
}
