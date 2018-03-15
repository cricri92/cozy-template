<?php

namespace App\Providers;

use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class HttpRequestsProvider extends ServiceProvider {
	private $apiUrl;
	private $headers;

    function __construct()
    {
        $this->apiUrl = env('API_URL');
        $this->headers = array('wasi_token' => env('WASI_TOKEN'), 'id_company' => env('ID_COMPANY'));
    }

    private function validateOptions($options) {
		$opts = $this->headers;

		if ($options != null) {
			$opts = array_merge($opts, $options);
		}

		return $opts;
	}

	public function validateRecaptcha($key) {
		$client   = new Client();
		$response = $client->post(env('GOOGLE_RECAPTCHA_VERIFY_URL'),
			['form_params' => [
					'secret'     => env('GOOGLE_RECAPTCHA_SECRET'),
					'response'   => $key
				]
			]
		);

		$body = json_decode((string) $response->getBody());
		return $body->success;
	}

	public function get($url, $options = null) {
		$client = new Client();

		$body = $this->validateOptions($options);

		$response = $client->request('POST',
			$this->apiUrl.$url,
			[
				'headers'       => [
					'Content-Type' => 'application/json'
				],
				'body' => (\GuzzleHttp\json_encode($body))
			]
		);

		return \GuzzleHttp\json_decode($response->getBody(), true);
	}

	public function post($url, $body) {
		$client = new Client();

		$body = $this->validateOptions($body);

		$response = $client->request('POST',
			$this->apiUrl.$url,
			[
				'headers'       => [
					'Content-Type' => 'application/json'
				],
				'body' => (\GuzzleHttp\json_encode($body))
			]
		);

		return $response->getStatusCode();
	}
}
