<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
// Models
use App\Models\Scrape\Vehicle;
use App\Models\Scrape\CdkLink;

class CheckLinkStatusJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $url;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->url = $url;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $date = Carbon::now()->toDateString();

        try {
            $response = Http::withHeaders([
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.113 Safari/537.36',
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8',
                'Accept-Encoding' => 'gzip, deflate, br',
            ])->withOptions([
                'allow_redirects' => false,
            ])->get($this->url);
        } catch (\Throwable $th) {
            abort(406, 'Not Acceptable');
        }

        $vehicle = Vehicle::where('url', $this->url)->firstOrFail();

        if ($vehicle) {
            // update vehicle
            if ($response->status() !== 200) {
                $vehicle->deleted_at = Carbon::now()->toDateTime();
                $vehicle->save();
            } else {
                $vehicle->updated_at = Carbon::now()->toDateTime();
                $vehicle->save();
            }
        }

        return $vehicle;
    }
}
