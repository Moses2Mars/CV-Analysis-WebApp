<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Field;

class JobFieldsApiController extends Controller
{
    public function getAllJobFields() {
        return Field::all();
    }
}
