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
        $error_codes = explode(',', $this->nhtsa_data['ErrorCode']);
        $error_text = explode('; ', $this->nhtsa_data['ErrorText']);

        // dd([$error_codes, $error_text]);

        if ( !in_array('7', $error_codes) ) {
            $output = [
                'result' => 'success',
                'error_codes' => $error_codes,
                'error_text' => $error_text,
                'nhtsa_data' => [
                    'airbags' => [
                        'curtain' => $this->nhtsa_data['AirBagLocCurtain'],
                        'front' => $this->nhtsa_data['AirBagLocFront'],
                        'knee' => $this->nhtsa_data['AirBagLocKnee'],
                        'seatCushion' => $this->nhtsa_data['AirBagLocSeatCushion'],
                        'side' => $this->nhtsa_data['AirBagLocSide'],
                    ],
                    'classification' => [
                        'body_class' => explode('/', $this->nhtsa_data['BodyClass']),
                        'body_type' => $this->nhtsa_data['NCSABodyType'],
                        'vehicle_type' => $this->nhtsa_data['VehicleType'],
                    ],
                    'drive_type' => explode('/', $this->nhtsa_data['DriveType']),
                    'engine' => [
                        'displacement' => [
                            'cc' => $this->nhtsa_data['DisplacementCC'],
                            'ci' => $this->nhtsa_data['DisplacementCI'],
                            'l' => $this->nhtsa_data['DisplacementL'],
                        ],
                        'configuration' => $this->nhtsa_data['EngineConfiguration'],
                        'cylinders' => $this->nhtsa_data['EngineCylinders'],
                        'hp' => $this->nhtsa_data['EngineHP'],
                        'manufacturer' => $this->nhtsa_data['EngineManufacturer'],
                        'model' => $this->nhtsa_data['EngineModel'],
                        'turbo' => $this->nhtsa_data['Turbo'],
                        'valve_train_design' => $this->nhtsa_data['ValveTrainDesign'],
                    ],
                    'gvwr' => $this->nhtsa_data['GVWR'],
                    'make' => $this->nhtsa_data['Make'],
                    'ncsa_make' => $this->nhtsa_data['NCSAMake'],
                    'manufacturer' => $this->nhtsa_data['Manufacturer'],
                    'model' => $this->nhtsa_data['Model'],
                    'model_year' => $this->nhtsa_data['ModelYear'],
                    'series' => [
                        $this->nhtsa_data['Series'],
                        $this->nhtsa_data['Series2'],
                    ],
                    'trim' => [
                        $this->nhtsa_data['Trim'],
                        $this->nhtsa_data['Trim2'],
                    ],
                    'vin' => $this->nhtsa_data['VIN'],
                ],
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
