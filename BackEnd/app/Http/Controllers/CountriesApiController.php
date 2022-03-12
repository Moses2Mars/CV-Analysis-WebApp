<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
class CountriesApiController extends Controller
{
    public function getAllCountries() {
        return Country::all();
    }
}
