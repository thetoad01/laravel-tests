<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MoveSqliteCdkLink implements ShouldQueue
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
        $links = DB::connection('sqlite')->table('cdk_links')
            ->latest()
            ->where('http_response_code', '!=', 418)
            ->take(10)
            ->get();

        if($links->isEmpty()) {
            return 'There were no links in the database.';
        };

        foreach ($links as $link) {
            $exists = DB::connection('mysql')->table('cdk_links')
                ->where('vdp_url', $link->vdp_url)
                ->first();

            if (!$exists) {
                DB::connection('mysql')->table('cdk_links')->insert([
                    'vdp_url' => $link->vdp_url,
                    'visited' => $link->visited,
                    'http_response_code' => $link->http_response_code,
                    'created_at' => $link->created_at,
                    'updated_at' => now()->toDateTimeString(),
                ]);
            } elseif ($exists && !$exists->http_response_code) {
                DB::connection('mysql')->table('cdk_links')
                ->where('vdp_url', $link->vdp_url)
                ->update([
                    'visited' => $link->visited,
                    'http_response_code' => $link->http_response_code,
                    'updated_at' => now()->toDateTimeString(),
                ]);
            } else {
                DB::connection('mysql')->table('cdk_links')
                ->where('vdp_url', $link->vdp_url)
                ->update([
                    'visited' => $link->visited,
                    'updated_at' => now()->toDateTimeString(),
                ]);
            }

            // set reponse code to 418 teapot
            DB::connection('sqlite')->table('cdk_links')->where('id', $link->id)->update([
                'http_response_code' => 418,
            ]);
        }
    }
}
