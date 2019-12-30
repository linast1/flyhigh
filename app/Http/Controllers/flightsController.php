<?php

namespace App\Http\Controllers;
use App\Flights;
use Illuminate\Http\Request;

class flightsController extends Controller
{
    public function index(){
        $allFlights = Flights::paginate(5);
        return view('flights', compact('allFlights'));
    }
}
