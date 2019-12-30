<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use App\Flights;
use App\Planes;
use App\AirPorts;
use App\Tickets;
use Auth;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Faker\Provider\DateTime;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Console\Input\Input;


class adminController extends Controller
{
    public function login(Request $request){
        if(Session::has('adminSession')){
            return redirect('admin/dashboard');
        } else {
            if($request->isMethod('post')){
                $data = $request->input();
                if(Auth::attempt(['username'=>$data['username'], 'password'=>$data['password']])){
                    Session::put('adminSession',$data['username']);
                    return redirect('admin/dashboard');
                } else {
                    return redirect('/admin')->with('flash_message_error','Neteisingas vartotojo vardas ar slaptažodis');
                }
            }

            return view('admin.admin_login');
        }
    }
    public function dashboard(Request $request){
        if(Session::has('adminSession')){
            $allFlights = Flights::paginate(5);
            $allPorts = AirPorts::all();
            $allPlanes = Planes::all();
            return view('admin.admin_dashboard', compact('allFlights', 'allPorts', 'allPlanes'));
        } else {
            return redirect('/admin')->with('flash_message_error','Reikalingas prisijungimas!');
        }
    }

    public function planes(){
        if(Session::has('adminSession')){
            $allPlanes = Planes::paginate(5);
            return view('admin.admin_planes', compact('allPlanes'));
        } else {
            return redirect('/admin')->with('flash_message_error','Reikalingas prisijungimas!');
        }
    }

    public function airports(){
        if(Session::has('adminSession')){
            $allPorts = AirPorts::paginate(5);
            return view('admin.admin_airports', compact('allPorts'));
        } else {
            return redirect('/admin')->with('flash_message_error','Reikalingas prisijungimas!');
        }
    }

    public function tickets(){
        if(Session::has('adminSession')){
            $allTickets = Tickets::paginate(5);
            $allFlights = Flights::all();
            return view('admin.admin_tickets', compact('allTickets', 'allFlights'));
        } else {
            return redirect('/admin')->with('flash_message_error','Reikalingas prisijungimas!');
        }
    }

    public function logout(){
        Session::flush();
        return redirect('/home');
    }

    public function insertFlight(Request $request){
        $validator = Validator::make(
            [   'airline_name' =>$request->input('firm'),
                'departure_time' =>$request->input('departure'),
                'arrival_time'=>$request->input('arrival'),
                'seats'=>$request->input('seats'),
                'fk_dep_airport'=>$request->input('from'),
                'fk_arr_airport'=>$request->input('to'),
                'fk_plane'=>$request->input('plane')
            ],
            [
                'airline_name' => 'required|alpha_num',
                'departure_time' => 'required',
                'arrival_time' => 'required',
                'seats' => 'required|alpha_num',
                'fk_dep_airport' => 'required',
                'fk_arr_airport' => 'required',
                'fk_plane' => 'required'
            ]
        );
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else{
            $flights = new Flights();
            $flights->airline_name = $request->input('firm');
            $flights->departure_time = $request->input('departure');
            $flights->arrival_time = $request->input('arrival');
            $flights->seats = $request->input('seats');
            $flights->fk_dep_airport = $request->input('from');
            $flights->fk_arr_airport = $request->input('to');
            $flights->fk_plane = $request->input('plane');

            $from = Carbon::parse($request->input('departure'));
            $to = Carbon::parse($request->input('arrival'));
            $flights->duration = $to->diff($from)->format('%H:%i');

            $flights->save();
        }
        return Redirect::to('admin/dashboard')->with('success', 'Skrydis pridėtas');
    }

    public function insertPlane(Request $request){
        $validator = Validator::make(
            [   'model' =>$request->input('model'),
                'captain' =>$request->input('captain'),
                'copilot'=>$request->input('copilot'),
                'make_date'=>$request->input('make_date')
            ],
            [
                'model' => 'required|alpha_num',
                'captain' => 'required|alpha',
                'copilot' => 'required|alpha',
                'make_date' => 'required|date'
            ]
        );
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else{
            $planes = new Planes();
            $planes->model = $request->input('model');
            $planes->captain = $request->input('captain');
            $planes->copilot = $request->input('copilot');
            $planes->make_date = $request->input('make_date');


            $planes->save();
        }
        return Redirect::to('admin/planes')->with('success', 'Lėktuvas pridėtas');
    }

    public function insertAirport(Request $request){
        $validator = Validator::make(
            [   'code' =>$request->input('code'),
                'city' =>$request->input('city'),
                'country'=>$request->input('country')
            ],
            [
                'code' => 'required|alpha_num|max:3|min:3',
                'city' => 'required|alpha',
                'country' => 'required|alpha',
            ]
        );
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else{
            $ports = new AirPorts();
            $code =  $request->input('code');
            $ports->code = strtoupper($code);
            $ports->city = $request->input('city');
            $ports->country = $request->input('country');


            $ports->save();
        }
        return Redirect::to('admin/airports')->with('success', 'Lėktuvas pridėtas');
    }

    public function insertTicket(Request $request){
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
            return Redirect::back()->withInput($request->input())
                                   ->withErrors($validator);
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
        return Redirect::to('admin/tickets')->with('success', 'Bilietas pridėtas');
    }

    public function editFlight($id){
        $selectedFlight = Flights::where('id', '=', $id)->first();
        $allPorts = AirPorts::all();
        $allPlanes = Planes::all();
        return view ('admin.admin_flightEdit', compact('selectedFlight', 'allPlanes', 'allPorts'));
    }

    public function editPlane($id){
        $selectedPlane = Planes::where('id', '=', $id)->first();
        return view ('admin.admin_planeEdit', compact('selectedPlane'));
    }

    public function editAirport($code){
        $selectedAirport = AirPorts::where('code', '=', $code)->first();
        return view ('admin.admin_airportEdit', compact('selectedAirport'));
    }

    public function editTicket($code){
        $selectedTicket = Tickets::where('code', '=', $code)->first();
        $allFlights = Flights::all();
        return view ('admin.admin_ticketsEdit', compact('selectedTicket', 'allFlights'));
    }

    public function confirmFlightEdit(Request $request, $id){
        $validator = Validator::make(
            [   'airline_name' =>$request->input('airline_name'),
                'departure_time' =>$request->input('departure_time'),
                'arrival_time'=>$request->input('arrival_time'),
                'seats'=>$request->input('seats'),
                'fk_dep_airport'=>$request->input('fk_dep_airport'),
                'fk_arr_airport'=>$request->input('fk_arr_airport'),
                'fk_plane'=>$request->input('fk_plane')
            ],
            [
                'airline_name' => 'required|alpha_dash',
                'departure_time' => 'required',
                'arrival_time' => 'required',
                'seats' => 'required|alpha_num',
                'fk_dep_airport' => 'required',
                'fk_arr_airport' => 'required',
                'fk_plane' => 'required'
            ]
        );
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $appendableData = $request->all();
            unset($appendableData ['_token']);

            $flight = Flights::where('id', '=', $id)->update($appendableData);
        }
        return Redirect::to('admin/dashboard')->with('success', 'Skrydis atnaujintas');
    }

    public function confirmPlaneEdit(Request $request, $id){
        $validator = Validator::make(
            [   'model' =>$request->input('model'),
                'captain' =>$request->input('captain'),
                'copilot'=>$request->input('copilot'),
                'make_date'=>$request->input('make_date'),
            ],
            [
                'model' => 'required|alpha_num',
                'captain' => 'required|alpha',
                'copilot' => 'required|alpha',
                'make_date' => 'required|date'
            ]
        );
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $appendableData = $request->all();
            unset($appendableData ['_token']);

            $plane = Planes::where('id', '=', $id)->update($appendableData);
        }
        return Redirect::to('admin/planes')->with('success', 'Lėktuvas atnaujintas');
    }

    public function confirmAirportEdit(Request $request, $code){
        $validator = Validator::make(
            [   'code' =>$request->input('code'),
                'city' =>$request->input('city'),
                'country'=>$request->input('country')
            ],
            [
                'code' => 'required|alpha_num|max:3|min:3',
                'city' => 'required|alpha',
                'country' => 'required|alpha',
            ]
        );
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $appendableData = $request->all();
            unset($appendableData ['_token']);
            $plane = AirPorts::where('code', '=', $code)->update($appendableData);
        }
        return Redirect::to('admin/airports')->with('success', 'Oro uostas atnaujintas');
    }

    public function confirmTicketEdit(Request $request, $code){
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
                'seat_number' => 'required|digits_between:1,200',
                'extra_baggage' => 'required',
                'fk_flight' => 'required'
            ]
        );
        if ($validator->fails())
        {
            return Redirect::back()->withErrors($validator);
        }
        else
        {
            $appendableData = $request->all();
            unset($appendableData ['_token']);
            $ticket = Tickets::where('code', '=', $code)->update($appendableData);
        }
        return Redirect::to('admin/tickets')->with('success', 'Bilietas atnaujintas');
    }

    public function deleteFlight($id){
        Flights::where('id', '=', $id)->delete();
        return Redirect::to('admin/dashboard')->with('success', 'Skrydis ištrintas');
    }

    public function deletePlane($id){
        Planes::where('id', '=', $id)->delete();
        return Redirect::to('admin/planes')->with('success', 'Lėktuvas ištrintas');
    }

    public function deleteAirport($code){
        AirPorts::where('code', '=', $code)->delete();
        return Redirect::to('admin/airports')->with('success', 'Oro uostas ištrintas');
    }

    public function deleteTicket($code){
        Tickets::where('code', '=', $code)->delete();
        return Redirect::to('admin/tickets')->with('success', 'Bilietas ištrintas');
    }
}
