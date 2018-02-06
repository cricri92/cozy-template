<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\HttpRequestsProvider as ClientHttp;

class HomeController extends Controller
{
    function index() {
        $typesForSale = $this->getPropertyTypesForSale();
        $typesForRent = $this->getPropertyTypesForRent();

        $properties = $this->getLatestProperties(11);
        $firstFiveProperties = array_slice($properties, 1, 5);
        $nextSixProperties = array_slice($properties, 6, 6);
        $clients = $this->getClients();
        $contactInfo = $this->getContactInfo();

        //dd($realtor);

        return view('home.home', array(
            'typesForSale' => $typesForSale,
            'typesForRent' => $typesForRent,
            'firstFiveProperties' => $firstFiveProperties,
            'nextSixProperties' => $nextSixProperties,
            'clients' => $clients,
            'contactInfo' => $contactInfo
        ));
    }

    function getPropertyTypesForSale() {
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

    function getPropertyTypesForRent() {
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

    function getLatestProperties($qty=5) {
        $client = new ClientHttp('');
        $data = $client->get('property/search', array(
            'id_availability' => 1,
            'take' => $qty,
            'Scope' => 1,
            'order_by' =>'id_status_on_page'
        ));

        return $data;
    }

    function getClients() {
        $client = new ClientHttp('');
        $data = $client->get('user/all-users');

        for($i=1; $i < sizeof($data)- 1; $i++) {
            if ($data[$i]['user_type'] != 'REALTOR') {
                unset($data[$i]);
            }
        }

        return array_slice($data, 0, 4);
    }

    function getContactInfo() {
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
