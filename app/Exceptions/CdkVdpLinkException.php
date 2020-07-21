<?php

namespace App\Exceptions;

use Exception;
use App\Models\Scrape\CdkLink;

final class CdkVdpLinkException extends Exception
{
    /**
    * Any extra data to send with the response.
    *
    * @var array
    */
    public $data = [];

    /**
     * Report the exception.
     *
     * @return void
     */
    public function report(): void
    {
        if (!empty($this->data)) {
            CdkLink::where('vdp_url', $this->data['url'])
                ->update([
                    'http_response_code' => $this->data['http_response_code'],
                    'visited' => true,
                ]);
        }
    }

    /**
     * Render the exception into an HTTP response.
     *
     * @return route scrape.cdk-vdp.index
     */
    public function render()
    {
        $url = isset($this->data['url']) ? $this->data['url'] : 'URL';

        return redirect()->route('scrape.cdk-vdp.index')->with('status', $url . ' did not response with 200.');
    }

    /**
     * Set the extra data to send with the response.
     *
     * @param string $url
     * @param int $http_response_code
     *
     * @return $this
     */
    public function withData($url, $http_response_code)
    {
        $this->data = [
            'url' => $url,
            'http_response_code' => $http_response_code,
        ];

        return $this;
    }
}
