<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Http;

use Carbon\Carbon;
// Models
use App\Models\Scrape\CdkLink;
use App\Models\Scrape\Vehicle;

class CheckActiveLinks implements ShouldQueue
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
        $date = Carbon::now()->toDateString();

        $vehicle = Vehicle::whereNull('deleted_at')
            ->whereDate('updated_at', 'not like', $date)
            ->with('cdkLink')
            ->inRandomOrder()
            ->take(1)
            ->get();

        $vehicle = $vehicle->first();

        if (!$vehicle->url) {
            abort(402, 'No more results from db.');
        }

        try {
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36',
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
                'Accept-Encoding' => 'gzip, deflate, br',
            ])->withOptions([
                'allow_redirects' => false,
            ])->get($vehicle->url);
        } catch (\Throwable $th) {
            abort(406, 'Not Acceptable');
        }

        if ($vehicle->cdkLink) {
            $vehicle->cdkLink->http_response_code = $response->status();
            $vehicle->cdkLink->updated_at = Carbon::now()->toDateTime();
            $vehicle->cdkLink->save();
        }

        if ($response->status() !== 200) {
            $vehicle->deleted_at = Carbon::now()->toDateTime();
            $vehicle->save();

            return response()->json([
                'vehicle' => $vehicle,
            ]);
        }

        return response()->json([
            'ok' => $response->ok(),
            'response' => $response->status(),
            'vehicle' => $vehicle,
        ]);
    }
}
