<?php

namespace App\Http\Controllers\Foe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FoeController extends Controller
{
    public function index()
    {
        return view('foe.index');
    }
}
