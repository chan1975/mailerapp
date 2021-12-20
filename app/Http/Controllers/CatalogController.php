<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;

class CatalogController extends Controller
{
    public function getCountries(Request $request){
        if ($request->ajax()) {
            $data = Country::all();

            return $data;
        }
    }
    public function getStates(Request $request){
        
        if ($request->ajax()) {
            $countryId = intval($request->country_id);
            
            $data = State::where('country_id',$countryId)->get();

            return $data;
        }
    }
    public function getCities(Request $request){
        
        if ($request->ajax()) {
            $countryId = intval($request->state_id);
            
            $data = City::where('state_id',$request->state_id)->get();

            return $data;
        }
    }
}
