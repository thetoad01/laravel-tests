<?php

namespace App\Helpers;

use PHPHtmlParser\Dom;

class ParseCdkVdpHelper
{
    /**
     * Parse VDP html
     * 
     * @param string $endpoint
     * @param string $data
     * 
     * @return array
     */
    public function handle($endpoint, $data)
    {
        $dom = new Dom;

        try {
            $dom->loadStr($data);
        } catch (\Throwable $th) {
            return [];
        }

        return [
            'url' => $endpoint,
            'dealer' => $dom->find('meta[itemprop=name]') ? trim($dom->find('meta[itemprop=name]')->content) : '',
            'vin' => $dom->find('span[itemprop=vehicleIdentificationNumber]')->count() != 0 ? $dom->find('span[itemprop=vehicleIdentificationNumber]')->text : '',
            'year' => $dom->find('span[itemprop=vehicleModelDate]')->count() != 0 ? $dom->find('span[itemprop=vehicleModelDate]')->text : '',
            'make' => $dom->find('span[itemprop=manufacturer]')->count() != 0 ? $dom->find('span[itemprop=manufacturer]')->text : '',
            'model' => $dom->find('span[itemprop=model]')->count() != 0 ? $dom->find('span[itemprop=model]')->text : '',
            'trim' => !$dom->find('span[itemprop=vehicleConfiguration]', 0) ? '' : $dom->find('span[itemprop=vehicleConfiguration]')->text,
            'exterior_color' => $dom->find('span[itemprop=color]')->count() != 0 ? $dom->find('span[itemprop=color]')->text : '',
            'interior_color' => $dom->find('span[itemprop=vehicleInteriorColor]')->count() != 0 ? $dom->find('span[itemprop=vehicleInteriorColor]')->text : '',
            'stock_number' => $dom->find('span[itemprop=sku]')->count() != 0 ? $dom->find('span[itemprop=sku]')->text : '',
        ];
    }
}
