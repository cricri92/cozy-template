<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\HttpRequestsProvider as ClientHttp;

class PropertiesController extends Controller
{
    public function index() {
        $properties = self::getLatestProperties(10);

        return view('properties.properties',
            array('properties' => $properties)
        );
    }

    public static function getLatestProperties($qty=5) {
        $client = new ClientHttp('');
        $data = $client->get('property/search', array(
            'id_availability' => 1,
            'take' => $qty,
            'Scope' => 1,
            'order_by' =>'id_status_on_page'
        ));

        return $data;
    }
}
