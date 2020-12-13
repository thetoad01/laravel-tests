<?php

namespace App\Http\Controllers\Csv;

use App\Http\Controllers\Controller;
use App\Jobs\AsCsvProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;

class CsvBatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = file(storage_path('app/csv/as008.csv'));

        // remove first row
        unset($data[0]);

        // make header
        $header = [
            'dealer_id',
            'dealer_name',
            'vin',
            'stock_number',
            'new_used',
            'year',
            'make',
            'model',
            'model_number',
            'body',
            'transmission',
            'series',
            'body_door_count',
            'odometer',
            'engine_cylinder_ct',
            'engine_displacement',
            'drivetrain_description',
            'colour',
            'interior_color',
            'msrp',
            'price',
            'inventory_date',
            'certified',
            'description',
            'features',
            'photo_url_list',
            'city_mpg',
            'highway_mpg',
            'photos_last_modified_date',
            'series_detail',
            'engine',
            'fuel',
            'age',
            'vehicle_detail_link'
        ];

        // chunking file
        $chunks = array_chunk($data, 50);

        // create batch for batch job processing
        $batch = Bus::batch([])->dispatch();

        // convert each chunk to new file
        foreach ($chunks as $key => $chunk) {
            $data = array_map('str_getcsv', $chunk);

            $batch->add(new AsCsvProcess($data, $header));
        }
        
        // return $batch;
        return Bus::findBatch($batch->id);
    }

    public function batch()
    {
        $batchId = request('id');

        return Bus::findBatch($batchId);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
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
        //
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
