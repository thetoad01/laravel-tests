<?php

namespace App\Http\Controllers\Security;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;

class UuidController extends Controller
{

    public function generate()
    {
        $uuid = Str::uuid();

        // dd($uuid);
        // return $uuid;

        $output = [
            'stuff' => 'stuff',
            'uuid' => $uuid,
            'documentId' => 'dealer::'.$uuid,
        ];

        return $output;
    }
}
