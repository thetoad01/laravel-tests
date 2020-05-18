<?php

namespace App\Repositories;

class NhtsaDecodeRepository
{
    protected $nhtsa_data;

    /**
     * @param array $data_array
     */
    public function __construct($data_array)
    {
        $this->nhtsa_data = $data_array;
    }

    /**
     * Format the NHTSA VIN decode data
     *
     * @return collection
     */
    public function run()
    {
        // dd($this->nhtsa_data);

        $error_codes = explode(',', $this->nhtsa_data->Results[0]->ErrorCode);
        $error_text = explode('; ', $this->nhtsa_data->Results[0]->ErrorText);

        // dd($error_codes);

        if ( !in_array('7', $error_codes) ) {
            $output = [
                'result' => 'success',
                'error_codes' => $error_codes,
                'error_text' => $error_text,
                'nhtsa_data' => [
                    'airbags' => [
                        'curtain' => $this->nhtsa_data->Results[0]->AirBagLocCurtain,
                        'front' => $this->nhtsa_data->Results[0]->AirBagLocFront,
                        'knee' => $this->nhtsa_data->Results[0]->AirBagLocKnee,
                        'seatCushion' => $this->nhtsa_data->Results[0]->AirBagLocSeatCushion,
                        'side' => $this->nhtsa_data->Results[0]->AirBagLocSide,
                    ],
                    'classification' => [
                        'body_class' => explode('/', $this->nhtsa_data->Results[0]->BodyClass),
                        'body_type' => $this->nhtsa_data->Results[0]->NCSABodyType,
                        'vehicle_type' => $this->nhtsa_data->Results[0]->VehicleType,
                    ],
                    'drive_type' => explode('/', $this->nhtsa_data->Results[0]->DriveType),
                    'engine' => [
                        'displacement' => [
                            'cc' => $this->nhtsa_data->Results[0]->DisplacementCC,
                            'ci' => $this->nhtsa_data->Results[0]->DisplacementCI,
                            'l' => $this->nhtsa_data->Results[0]->DisplacementL,
                        ],
                        'configuration' => $this->nhtsa_data->Results[0]->EngineConfiguration,
                        'cylinders' => $this->nhtsa_data->Results[0]->EngineCylinders,
                        'hp' => $this->nhtsa_data->Results[0]->EngineHP,
                        'manufacturer' => $this->nhtsa_data->Results[0]->EngineManufacturer,
                        'model' => $this->nhtsa_data->Results[0]->EngineModel,
                        'turbo' => $this->nhtsa_data->Results[0]->Turbo,
                        'valve_train_design' => $this->nhtsa_data->Results[0]->ValveTrainDesign,
                    ],
                    'gvwr' => $this->nhtsa_data->Results[0]->GVWR,
                    'make' => $this->nhtsa_data->Results[0]->Make,
                    'ncsa_make' => $this->nhtsa_data->Results[0]->NCSAMake,
                    'manufacturer' => $this->nhtsa_data->Results[0]->Manufacturer,
                    'model' => $this->nhtsa_data->Results[0]->Model,
                    'model_year' => $this->nhtsa_data->Results[0]->ModelYear,
                    'series' => [
                        $this->nhtsa_data->Results[0]->Series,
                        $this->nhtsa_data->Results[0]->Series2,
                    ],
                    'trim' => [
                        $this->nhtsa_data->Results[0]->Trim,
                        $this->nhtsa_data->Results[0]->Trim2,
                    ],
                    'vin' => $this->nhtsa_data->Results[0]->VIN,
                ],
                // 'zstuff' => $this->nhtsa_data->Results[0],
            ];
        } else {
            $output = [
                'result' => 'error',
                'error_codes' => $error_codes,
                'error_text' => $error_text,
                'nhtsa_data' => null,
            ];
        }

        return $output;
    }
}
