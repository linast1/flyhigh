<?php

namespace App\Http\Controllers;

use App\Flights;
use App\Tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ticketController extends Controller
{
    public function index()
    {
        return view('ticket');
    }

    public function searchTicket(Request $request){
        $myTicket = Tickets::where('code', '=', $request->input('code'))->first();
        if(!$myTicket == null){
            return view('myTicket', compact('myTicket'));
        } else {
            return Redirect::back()->withErrors('Tokiu kodu bilieto nėra.');
        }

    }
}
