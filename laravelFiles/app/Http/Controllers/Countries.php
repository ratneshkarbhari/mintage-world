<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use PDO;

class Countries extends Controller
{
    function get_countries_dropdown_html(Request $request) {
        
        $countryCategory = $request->product_type;

        $countriesForCategory = Country::where("category_id",$countryCategory)->get();

        $countriesHtml = '';

        foreach($countriesForCategory as $country){
            $countriesHtml.='<option value="'.$country['id'].'">'.$country['name'].'</option>';
        }

        return $countriesHtml;

    }
}
