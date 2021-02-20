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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'photo' => 'required|image|max:3000',
        ]);

        $result_local = Storage::disk('public')->putFileAs('a4f5', $request->photo, 'upload.jpg', 'public');
        $result_s3 = Storage::disk('s3')->putFileAs('a4f5', $request->photo, 'upload.jpg', 'public');

        return [
            'local' => Storage::disk('public')->url($result_local),
            'S3' => Storage::disk('s3')->url($result_s3),
        ];
    }
}
