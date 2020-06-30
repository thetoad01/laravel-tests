<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectionMacrosController extends Controller
{
    public function index()
    {
        $collection = collect([
            ['name', 'email'],
            ['Alice', 'alice@test.com'],
            ['Bob', 'bob@test.com'],
            ['Carol', 'carol@test.com'],
        ]);

        $headers = collect($collection->head());
        $data = $collection->tail();

        $output = [];
        foreach ($data as $key => $value) {
            $output[] = [
                $headers->head() => $value[0],
                $headers->second() => $value[1],
            ];
        }

        dd($output);
    }
}
