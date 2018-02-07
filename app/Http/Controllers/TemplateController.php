<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\HttpRequestsProvider as ClientHttp;

class TemplateController extends Controller
{
    // --------------- HEADER'S METHODS ----------------------

    public static function getPropertyTypesForSale() {
        $client = new ClientHttp('');
        $data = $client->get('property-type/all', array(
                'quantity' => true,
                'scope' => 1,
                'for_sale' => true,
                'for_rent' => false,
                'for_transfer' => false
            )
        );

        return $data;
    }

    public static function getPropertyTypesForRent() {
        $client = new ClientHttp('');
        $data = $client->get('property-type/all', array(
                'quantity' => true,
                'scope' => 1,
                'for_sale' => false,
                'for_rent' => true,
                'for_transfer' => false
            )
        );

        return $data;
    }

    public static function getContactInfo() {
        $client = new ClientHttp('');
        $data = $client->get('user/all-users');

        for($i=1; $i < sizeof($data)- 1; $i++) {
            if ($data[$i]['user_type'] != 'REALTOR' && $data[$i]['has_profile']) {
                unset($data[$i]);
            }
        }

        return $data[0];
    }
}
