<?php

namespace App\Http\Controllers\Fitbit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use League\Csv\Reader;

class ActivityController extends Controller
{
    public function index()
    {
        // $fileName = 'fitbit_export_all.csv';
        // $fileName = 'fitbit_export_activities_sleep.csv';
        $fileName = 'fitbit_export_activity.csv';

        $file = Storage::disk('local')->get('fitbit/' . $fileName);

        $csv = Reader::createFromString($file);
        $csv->setHeaderOffset(1);
        $header_offset = $csv->getHeaderOffset();
        $header = $csv->getHeader();
        $records = $csv->getRecords();

        $output = [];
        foreach ($records as $offset => $record) {
            if ( isset($record['Calories Burned']) && strtotime($record['Date']) && ! strtotime($record['Calories Burned']) ) {
                // $output[] = $record;

                $output[] = [
                    'date' => $record['Date'],
                    'calories_burned' => (int) str_replace(',', '', $record['Calories Burned']),
                    'steps' => (int) str_replace(',', '', $record['Steps']),
                    'distance' => (float) str_replace(',', '', $record['Distance']),
                    'floors' => (int) str_replace(',', '', $record['Floors']),
                    'minutes_sedentary' => (int) str_replace(',', '', $record['Minutes Sedentary']),
                    'minutes_lightly_active' => (int) str_replace(',', '', $record['Minutes Lightly Active']),
                    'minutes_fairly_active' => (int) str_replace(',', '', $record['Minutes Fairly Active']),
                    'minutes_very_active' => (int) str_replace(',', '', $record['Minutes Very Active']),
                    'activity_calories' => (int) str_replace(',', '', $record['Activity Calories']),
                ];
            }
        }

        return $output;
    }
}
