<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
// Models
use App\Models\Scrape\Vehicle;

class MoveSqliteVehicle implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $vehicle = DB::connection('sqlite')->table('vehicles')
            ->where('created_at', 'like', '2020-%')
            ->inRandomOrder()
            ->first();

        abort_if(!$vehicle, 404);

        Vehicle::updateOrInsert(
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
    }
}
