<?php

namespace App\Http\Controllers;

use App\AirPorts;
use App\Flights;
use App\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index()
    {
        Session::flush();
        $allFlights = Flights::all();
        $allPorts = AirPorts::all();
        return view('home', compact('allFlights', 'allPorts'));
    }

    public function searchTickets(Request $request){
        $ownername = $request->input('owner_name');
        $ownersurname = $request->input('owner_surname');
        $selectedFlight = Flights::where([
            ['fk_dep_airport', '=', $request->input('departureValue')],
            ['fk_arr_airport', '=', $request->input('arrivalValue')],
            ['departure_time', '=', $request->input('departure')],
            ['arrival_time', '=', $request->input('arrival')]
        ])->get();
        if(!$selectedFlight->isEmpty()){
            return view ('searchTickets', compact('selectedFlight', 'ownername', 'ownersurname'));
        } else {
            return Redirect::back()->withErrors('Skrydžių iš pasirinktų oro uostų ar pasirinktu laiku nėra');
        }

    }

    public function confirmPurchase(Request $request){
        $validator = Validator::make(
            [   'owner_name' =>$request->input('owner_name'),
                'owner_surname' =>$request->input('owner_surname'),
                'owner_email'=>$request->input('owner_email'),
                'seat_number'=>$request->input('seat_number'),
                'extra_baggage'=>$request->input('extra_baggage'),
                'fk_flight'=>$request->input('fk_flight')
            ],
            [
                'owner_name' => 'required|alpha',
                'owner_surname' => 'required|alpha',
                'owner_email' => 'required|email',
                'seat_number' => 'required|integer|between:1,200',
                'extra_baggage' => 'required',
                'fk_flight' => 'required'
            ],
            [
                'owner_name.required' => 'Savininko vardas privalomas!',
                'owner_name.alpha' => 'Savininko vardas sudaromas tik iš raidžių!',
                'owner_surname.required' => 'Savininko pavardė privaloma!',
                'owner_surname.alpha' => 'Savininko pavardė sudaroma tik iš raidžių!',
                'owner_email.required' => 'Savininko el. paštas privalomas!',
                'owner_email.email' => 'Savininko el. paštas nekorektiškas!',
                'seat_number.required' => 'Vietos numeris privalomas!',
                'seat_number.integer' => 'Sėdimą vietą nurodo tik skaičiai!',
                'seat_number.between' => 'Sėdimos vietos skaičius per didelis arba per mažas!'
            ]
        );
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else{
            $tickets = new Tickets();
            $letters = strtoupper(Str::random(mt_rand(3,3)));
            $numbers = '';
            for ($i = 0; $i<2; $i++)
            {
                $numbers .= mt_rand(0,9);
            }
            $code = $letters.$numbers;
            $tickets->code = $code;
            $tickets->owner_name = $request->input('owner_name');
            $tickets->owner_surname = $request->input('owner_surname');
            $tickets->owner_email = $request->input('owner_email');
            $tickets->seat_number = $request->input('seat_number');
            $tickets->extra_baggage = $request->input('extra_baggage');
            $tickets->fk_flight = $request->input('fk_flight');


            $tickets->save();
        }
        return Redirect::to('home')->withErrors('Bilietas nupirktas, jūsų kodas: '.$code);
    }
}
