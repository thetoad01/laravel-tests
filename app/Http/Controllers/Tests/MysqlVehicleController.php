<?php

namespace App\Http\Controllers\Tests;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
// Models
use App\Models\Scrape\Vehicle;

class MysqlVehicleController extends Controller
{
    public function index()
    {
        $vehicle = DB::connection('sqlite')->table('vehicles')
            ->where('stock_number', '!=', 'moved')
            ->latest()
            ->skip(1000)
            ->take(10)
            ->get();

        return $vehicle;
    }

    public function move()
    {
        $vehicles = DB::connection('sqlite')->table('vehicles')
            ->where('stock_number', '!=', 'moved')
            ->latest()
            ->skip(1000)
            ->take(10)
            ->get();

        abort_if(!$vehicles, 404);

        $output = [];
        foreach ($vehicles as $vehicle) {
            $exists = DB::connection('mysql')->table('vehicles')
                ->where('vin', $vehicle->vin)
                ->where('stock_number', $vehicle->stock_number)
                ->first();

            // dd($exists);

            if (!$exists) {
                // dd($vehicle->toArray());
                DB::connection('mysql')->table('vehicles')->insert([
                    'dealer' => $vehicle->dealer,
                    'url' => $vehicle->url,
                    'vin' => $vehicle->vin,
                    'year' => $vehicle->year,
                    'make' => $vehicle->make,
                    'model' => $vehicle->model,
                    'trim' => $vehicle->trim,
                    'exterior_color' => $vehicle->exterior_color,
                    'interior_color' => $vehicle->interior_color,
                    'stock_number' => $vehicle->stock_number,
                    'deleted_at' => $vehicle->deleted_at,
                    'created_at' => $vehicle->created_at,
                    'updated_at' => now()->toDateTimeString(),
                ]);

                $created = true;
            } else {
                $created = false;
            }

            DB::connection('sqlite')->table('vehicles')->where('id', $vehicle->id)->update(['stock_number' => 'moved']);

            $output[] = [
                'vin' => $vehicle->vin,
                'created' => $created,
            ];
        };

        return response()->json($output);
    }

    public function moveCdkLink()
    {
        $links = DB::connection('sqlite')->table('cdk_links')
            // ->where('created_at', 'like', '2020-03%')
            ->latest()
            ->where('http_response_code', '!=', 418)
            // ->skip(100)
            ->take(10)
            ->get();

        if($links->isEmpty()) {
            return 'There were no links in the database.';
        };

        // return $links;

        $output = [];
        foreach ($links as $link) {
            $exists = DB::connection('mysql')->table('cdk_links')
                ->where('vdp_url', $link->vdp_url)
                ->first();

            // dd($exists);

            if (!$exists) {
                // dd($vehicle->toArray());
                DB::connection('mysql')->table('cdk_links')->insert([
                    'vdp_url' => $link->vdp_url,
                    'visited' => $link->visited,
                    'http_response_code' => $link->http_response_code,
                    'created_at' => $link->created_at,
                    'updated_at' => now()->toDateTimeString(),
                ]);

                $created = true;
            } elseif ($exists && !$exists->http_response_code) {
                DB::connection('mysql')->table('cdk_links')
                ->where('vdp_url', $link->vdp_url)
                ->update([
                    'visited' => $link->visited,
                    'http_response_code' => $link->http_response_code,
                    'updated_at' => now()->toDateTimeString(),
                ]);

                $created = 'status';
            } else {
                DB::connection('mysql')->table('cdk_links')
                ->where('vdp_url', $link->vdp_url)
                ->update([
                    'visited' => $link->visited,
                    'updated_at' => now()->toDateTimeString(),
                ]);

                $created = false;
            }

            // set reponse code to 418 teapot
            DB::connection('sqlite')->table('cdk_links')->where('id', $link->id)->update([
                'http_response_code' => 418,
            ]);

            $output[] = [
                'vdp_url' => $link->vdp_url,
                'visited' => $link->visited,
                'http_response_code' => $link->http_response_code,
                'created_at' => $link->created_at,
                'new' => $created,
            ];
        }

        return response()->json($output);
    }

    public function moveCdkSitemap()
    {
        $sitemap = DB::connection('sqlite')->table('cdk_sitemaps')
            ->where('http_response_code', '!=', 'moved')
            ->first();

        if (!$sitemap) {
            dd("You've run out of links to move!");
        }

        $data = new \App\Models\Scrape\CdkSitemap;

        $data = $data->firstOrCreate(
            [
                'sitemap_url' => $sitemap->sitemap_url,
            ],
            [
                'state' => $sitemap->state,
                'deleted_at' => $sitemap->deleted_at,
                'created_at' => $sitemap->created_at,
                'updated_at' => $sitemap->updated_at,
                'http_response_code' => $sitemap->http_response_code,
            ]
        );

        // dd($data->sitemap_url);

        $result = DB::connection('sqlite')->table('cdk_sitemaps')
            ->where('sitemap_url', $data->sitemap_url)
            ->update(['http_response_code' => 'moved']);

        if ($result) {
            return $data;
        } else {
            return response()->json([
                'status' => 'error',
                'mysql_sitemap' => $sitemap,
            ]);
        }
    }
}
