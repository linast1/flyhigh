@extends('layouts.app')
@section('flightsBtn')
    <li class="nav-item">
        <a href="{{ url('flights') }}">Skrydžiai</a>
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
@section('home')
    <div id = "search-block">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{!! \Session::get('success') !!}</p>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <p style="text-align:center">{{$errors->first()}}</p>
            </div>
        @endif
        <label class =  "search-label"> SKRYDŽIŲ PAIEŠKA </label>
        <div action method="post" class = "search-form">
            <div class = "search-form-block">
                <div id = "input-error-dep">
                    <label class = "input-error-tip">Neįvestas išvykimo oro uostas</label>
                </div>
                <div class = "input-container">
                    <label class = "search-top">Išvykimo oro uostas:</label>
                    <select id = "search-select-dep" name="from">
                        @foreach($allPorts as $portsData )
                            <option id = "dep-option" value="{{$portsData->getKey()}}">{{$portsData->code}}-{{$portsData->city}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class = "search-form-block">
                <div id = "input-error-arr">
                    <label class = "input-error-tip">Neįvestas atvykimo oro uostas</label>
                </div>
                <div class= "input-container">
                    <label class = "search-top">Atvykimo oro uostas:</label>
                    <select id = "search-select-arr" name="to">
                        @foreach($allPorts as $portsData )
                            <option id = "arr-option" value="{{$portsData->getKey()}}">{{$portsData->code}}-{{$portsData->city}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class= "search-form-block">
                <button id = "search-button" type="button">Ieškoti</button>
            </div>
        </div>
    </div>
    <form class = "expanded-form-insert" method="get" action="{{ url('searchTickets') }}"> {{csrf_field()}}
        <div class = "expanded-form-content">
            <div class = "expanded-form-header">
                <span class = "expanded-close">&times</span>
                <label class = "expanded-form-label">Kas keliauja?</label>
            </div>
            <div class = "expanded-form-body">
                <p id = "departure-name" name="dep_airport"></p>
                <input id="departure-value" name="departureValue" style="display: none">
                <p id = "arrival-name" name="arr_airport"></p>
                <input id="arrival-value" name="arrivalValue" style="display: none">
                <div class = "expanded-inputs">
                    <label id = "name-label">Vardas:</label>
                    <input id = "expanded-name" name="owner_name" type = "text" autocomplete="off">
                    <label id = "surname-label">Pavardė:</label>
                    <input id = "expanded-surname" name="owner_surname" type = "text" autocomplete="off">
                    <div id = "expanded-dates">
                        <label id="name-label">Išvykimas:</label>
                        <input id = "expanded-duration" type="datetime-local" autocomplete="off" name="departure">
                        <label id="name-label">Atvykimas:</label>
                        <input id = "expanded-duration" type="datetime-local" autocomplete="off" name="arrival">
                    </div>
                    <div class = "expanded-form-button">
                        <button class = "expanded-button">Patvirtinti</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
