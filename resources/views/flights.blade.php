@extends('layouts.app')

@section('homeBtn')
    <li class="nav-item">
        <a href="{{ url('home') }}">Pirkti bilietą</a>
    </li>
@endsection
@section('ticketBtn')
    <li class="nav-item">
        <a href="{{ url('ticket') }}">Mano bilietas</a>
    </li>
@endsection
@section('other')
    <li class="nav-item">
        <a>D.U.K</a>
    </li>
    <li class="nav-item">
        <a>Apie mus</a>
    </li>
@endsection
@section('table')
    <div id = "flights-block">
        <label class =  "search-label"> VISI SKRYDŽIAI </label>
        <table id = "flights-table">
            <thead>
            <tr>
                <th>Skrydžio nr.</th>
                <th>Oro linijos</th>
                <th>Iš</th>
                <th>Į</th>
                <th>Trukmė</th>
                <th>Vietų kiekis</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allFlights as $flightsData )
                <tr>
                    <td>{{ $flightsData -> id }}</td>
                    <td>{{ $flightsData -> airline_name }}</td>
                    <td>{{ $flightsData -> fk_dep_airport }}</td>
                    <td>{{ $flightsData -> fk_arr_airport }}</td>
                    <td>{{ $flightsData -> duration }}</td>
                    <td>{{ $flightsData -> seats }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class = "pages">
            {{$allFlights->links("pagination::bootstrap-4")}}
        </div>
    </div>
@endsection

