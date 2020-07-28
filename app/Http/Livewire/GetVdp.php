<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Scrape\CdkLink;

class GetVdp extends Component
{
    public function render()
    {
        $cdk_link = $this->getUrl();

        $data = $this->getVehicle($cdk_link);

        return view('livewire.get-vdp', [
            'url' => $cdk_link->vdp_url ?? '',
            'http_response_code' => isset($data['http_response_code']) ? $data['http_response_code'] : null,
            'vehicle' => isset($data['data']) ? $data['data'] : '',
        ]);
    }

    protected function getUrl()
    {
        return CdkLink::where('visited', 0)
            ->inRandomOrder()
            ->first();
    }

    protected function getVehicle($cdk_link)
    {
        $data = new \App\Services\Scrape\ProcessCdkVdp($cdk_link->id, $cdk_link->vdp_url);
        $data = $data->handle();

        return $data;
    }
}
