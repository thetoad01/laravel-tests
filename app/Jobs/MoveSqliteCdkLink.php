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
        $link = DB::connection('sqlite')->table('cdk_links')
            ->latest()
            ->where('http_response_code', 200)
            ->first();

        abort_if(!$link, 404);

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

        // set reponse code to 418 teapot
        DB::connection('sqlite')->table('cdk_links')->where('id', $link->id)->update([
            'http_response_code' => 418,
        ]);
    }
}
