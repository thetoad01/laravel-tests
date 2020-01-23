<?php

namespace App\Http\Controllers\Scrape;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Scrape\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vehicles = Vehicle::whereNull('deleted_at')
            ->when($request->year, function($query) use ($request) {
                $query->where('year', $request->year);
            })
            ->when($request->make, function($query) use ($request) {
                $query->where('make', $request->make);
            })
            ->when($request->model, function($query) use ($request) {
                $query->where('model', $request->model);
            })
            ->orderBy('id', 'desc')
            ->paginate(25);

        // get available years
        $years = Vehicle::distinct()
            ->when($request->make, function($query) use ($request) {
                $query->where('make', $request->make);
            })
            ->when($request->model, function($query) use ($request) {
                $query->where('model', $request->model);
            })
            ->orderBy('year', 'desc')
            ->get('year');

        // get available makes
        $makes = Vehicle::distinct()
            ->when($request->year, function($query) use ($request) {
                $query->where('year', $request->year);
            })
            ->when($request->model, function($query) use ($request) {
                $query->where('model', $request->model);
            })
            ->orderBy('make')
            ->get('make');

        // get available models
        $models = Vehicle::distinct()
            ->when($request->year, function($query) use ($request) {
                $query->where('year', $request->year);
            })
            ->when($request->make, function($query) use ($request) {
                $query->where('make', $request->make);
            })
            ->orderBy('model')
            ->get('model');

        return view('vehicles.index')
            ->with('vehicles', $vehicles)
            ->with('years', $years)
            ->with('makes', $makes)
            ->with('models', $models);
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
        $vehicle = Vehicle::find($id);

        return view('vehicles.show')->with('vehicle', $vehicle);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);

        return view('vehicles.edit')->with('vehicle', $vehicle);
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
