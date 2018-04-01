<?php

namespace Pushover\Api;

class ApiFake
{
    /**
     * @param string $endpoint
     * @param array $payload
     *
     * @return mixed
     */
    public function call(string $endpoint, array $payload)
    {
        $c = curl_init();
        curl_setopt($c, CURLOPT_URL, $endpoint);
        curl_setopt($c, CURLOPT_HEADER, false);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($c, CURLOPT_POSTFIELDS, $payload);
        $response = curl_exec($c);

        if ($this->debug) {
            return $response;
        } else {
            $response = json_decode($response);
            return $response->status;
        }
    }
}
