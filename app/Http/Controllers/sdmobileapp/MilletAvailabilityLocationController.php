<?php

namespace App\Http\Controllers\sdmobileapp;

use App\sdmobileapp\models\MilletAvailabilityLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MilletAvailabilityLocationController extends Controller
{

    public function showAll()
    {
        $rows = MilletAvailabilityLocation::paginate(15);
        $arr = [];
        foreach($rows as $row)
        {
            $row->address = self::geocode($row->address);

            $arr[] = $row;

        }
        return response()->json($arr);
    }

    // function to geocode address, it will return false if unable to geocode address
    private static function geocode($address){

        // url encode the address
        $address = urlencode($address);

        // google map geocode api url
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyBtSQJF_yrYDzyHG8jenfSm6TQK5scu1t0";
        echo $url;
        // get the json response
        $resp_json = file_get_contents($url);

        // decode the json
        $resp = json_decode($resp_json, true);

        // response status will be 'OK', if able to geocode given address
        if($resp['status']=='OK'){

            // get the important data
            $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
            $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
            $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";

            // verify if data is complete
            if($lati && $longi && $formatted_address){

                // put the data in the array
                $data_arr = array();

                array_push(
                    $data_arr,
                    $lati,
                    $longi,
                    $formatted_address
                );

                return $data_arr;

            }else{
                return false;
            }

        }

        else{
            echo "<strong>ERROR: {$resp['status']}</strong>";
            return false;
        }
    }
}