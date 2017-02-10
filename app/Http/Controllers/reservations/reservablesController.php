<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\availability;

class reservablesController extends Controller
{
    public function index()
    {
        //$availability = availability_field::where('field_id','=',$field_id)->orderby('ini_hour','ASC')->get();

        return view('reservations.reservable.index');
    }
}
