<?php

namespace App\Console\Commands;

use App\Clients\CdkVdpLinkClient;
use App\Models\Scrape\CdkLink;
use Illuminate\Console\Command;

class GetCdkVdp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:cdkvdp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Visit and scrape a CDK VDP';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $vdp = CdkLink::where('visited', 0)
            ->inRandomOrder()
            ->first();

        if (!$vdp) {
            $this->error('No un-visited VDPs');
            return;
        }

        // visit link
        $data = collect((new CdkVdpLinkClient)->handle($vdp->vdp_url));

        // update link status
        $vdp->http_response_code = $data['response_code'];
        $vdp->visited = true;
        $vdp->save();

        if (!$data['data']) {
            $this->error('No VDP data for ' . $vdp->vdp_url);
            return;
        };

        $vehicle = (new \App\Helpers\ParseCdkVdpHelper)->handle($vdp->vdp_url, $data['data']);

        dispatch(
            new \App\Jobs\ProcessCdkVdpJob($data['response_code'], $vehicle)
        );

        $this->info('VDP process job queued for ' . $vdp->vdp_url);
    }
}
