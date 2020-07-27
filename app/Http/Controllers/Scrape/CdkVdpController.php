<?php

namespace App\Http\Controllers\Scrape;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clients\CdkVdpLinkClient;
// models
use App\Models\Scrape\CdkLink;
use App\Models\Scrape\Vehicle;

class CdkVdpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = CdkLink::where('visited', false)
            ->orderBy('created_at')
            ->paginate(25);

        return view('scrape.cdk-vdp.index', [
            'links' => $links,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vdp = CdkLink::find($id);

        $data = new \App\Services\Scrape\ProcessCdkVdp($id, $vdp->vdp_url);
        $vehicle = $data->handle();

        if (!$vehicle['data']) {
            return view('scrape.cdk-vdp.show', [
                'url' => $vehicle['url'],
                'response' => $vehicle['http_response_code'],
                'vehicle' => $vehicle['data'],
            ]);
        }

        return view('scrape.cdk-vdp.show', [
            'url' => $vehicle['url'],
            'response' => $vehicle['http_response_code'],
            'vehicle' => $vehicle['data'],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Process VDPs
     */
    public function process()
    {        
        $vdp = CdkLink::where('visited', 0)
            ->inRandomOrder()
            ->first();

        abort_if(!$vdp, 404);

        $data = new \App\Services\Scrape\ProcessCdkVdp($vdp->id, $vdp->vdp_url);
        $data = $data->handle();

        if (!$data['data']) {
            return view('scrape.cdk-vdp.process', [
                'response' => $data['http_response_code'],
                'vehicle' => [
                    'url' => $vdp->vdp_url,
                ],
            ]);
        };

        return view('scrape.cdk-vdp.process', [
            'response' => $data['http_response_code'],
            'vehicle' => $data['data'],
        ]);
    }
}
