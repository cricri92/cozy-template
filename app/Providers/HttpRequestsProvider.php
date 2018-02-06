<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use GuzzleHttp\Client;


class HttpRequestsProvider extends ServiceProvider
{
    private $apiUrl = 'https://api.wasi.co/v1/';
    private $headers =  array('wasi_token' => 'p5c8_VKyG_1tlo_8RMl', 'id_company' => 248498);

    private function validateOptions($options) {
        $opts = $this->headers;

        if ($options != null) {
            $opts = array_merge($opts, $options);
        }

        return $opts;
    }

    public function get($url, $options=null) {
        $client = new Client();

        $body = $this->validateOptions($options);

        $response = $client->request('POST',
                        $this->apiUrl.$url,
                        [
                            'headers' => [
                                'Content-Type' => 'application/json'
                            ],
                            'body' => (\GuzzleHttp\json_encode($body))
                        ]
                    );

        return \GuzzleHttp\json_decode($response->getBody(), true);
    }

    public function post($url, $body) {

    }
}
