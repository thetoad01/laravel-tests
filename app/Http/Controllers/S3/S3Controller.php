<?php

namespace App\Http\Controllers\S3;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class S3Controller extends Controller
{
    public function index()
    {
        return view('s3.index');
    }

    public function show($id)
    {
        dd("This is the show function with id = $id");
    }

    public function create()
    {
        return view('s3.create');
    }
}
