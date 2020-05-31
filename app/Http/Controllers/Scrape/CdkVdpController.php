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

        $data = collect((new CdkVdpLinkClient)->handle($vdp->vdp_url));

        if (!$data['data']) {
            // record the url status
            $vdp->http_response_code = $data['response_code'];
            $vdp->visited = true;
            $vdp->save();
            
            return [
                'response' => $data['response_code'],
                'data' => '',
                'url' => $vdp->vdp_url,
            ];
        };

        $vehicle = (new \App\Helpers\ParseCdkVdpHelper)->handle($vdp->vdp_url, $data['data']);

        if (!$vehicle['vin']) {
            // record the url status
            $vdp->http_response_code = $data['response_code'];
            $vdp->visited = true;
            $vdp->save();

            return redirect()->route('scrape.cdk-vdp.index');
        }

        $result = Vehicle::firstOrCreate(
            [
                'url' => $vehicle['url'],
                'vin' => $vehicle['vin'],
            ],
            [
                'dealer' => $vehicle['dealer'],
                'year' => $vehicle['year'],
                'make' => $vehicle['make'],
                'model' => $vehicle['model'],
                'trim' => $vehicle['trim'],
                'exterior_color' => $vehicle['exterior_color'],
                'interior_color' => $vehicle['interior_color'],
                'stock_number' => $vehicle['stock_number'],
            ]
        );

        // record the url status
        $vdp->http_response_code = $data['response_code'];
        $vdp->visited = true;
        $vdp->save();

        return redirect()->route('scrape.cdk-vdp.index');
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
}