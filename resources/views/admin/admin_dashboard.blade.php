@extends('layouts.app')

@section('tickets')
    <li class="nav-item">
        <a href="{{ url('admin/tickets') }}">Bilietai</a>
    </li>
@endsection
@section('airports')
    <li class="nav-item">
        <a href="{{ url('admin/airports') }}">Oro uostai</a>
    </li>
@endsection
@section('planes')
    <li class="nav-item">
        <a href="{{ url('admin/planes') }}">Lėktuvai</a>
    </li>
@endsection
@section('logout')
    <li class="nav-item">
        <a href="{{ url('/logout') }}">Atsijungti</a>
    </li>
@endsection
@section('messages')
    @if (\Session::has('success'))
        <div class="alert alert-success">
            <p>{!! \Session::get('success') !!}</p>
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <p>jūsų įvedamuose duomenyse yra klaidu:</p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    </div>
    @endif
@endsection
@section('table')
    <div id = "flights-block">
        @if (\Session::has('success'))
            <div class="alert alert-success">
                <p>{!! \Session::get('success') !!}</p>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <label class =  "search-label"> VISI SKRYDŽIAI </label>
        <table id = "flights-table">
            <thead>
            <tr>
                <th>Skrydžio nr.</th>
                <th>Oro linijos</th>
                <th>Iš</th>
                <th>Į</th>
                <th>Išvyksta</th>
                <th>Atvyksta</th>
                <th>Trukmė</th>
                <th>Vietų kiekis</th>
                <th>Lėktuvo id</th>
                <th id="update-hrow">Keisti?</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allFlights as $flightsData )
                <tr>
                    <td>{{ $flightsData -> id }}</td>
                    <td>{{ $flightsData -> airline_name }}</td>
                    <td>{{ $flightsData -> fk_dep_airport }}</td>
                    <td>{{ $flightsData -> fk_arr_airport }}</td>
                    <td>{{ \Carbon\Carbon::parse($flightsData->departure_time)->format('Y-m-d H:i')}}</td>
                    <td>{{ \Carbon\Carbon::parse($flightsData->arrival_time)->format('Y-m-d H:i')}}</td>
                    <td>{{ \Carbon\Carbon::parse($flightsData->duration)->format('H:i')}}</td>
                    <td>{{ $flightsData -> seats }}</td>
                    <td>{{ $flightsData -> fk_plane }}</td>
                    <td id="update-row"><a class = "update-button"  href="{{ route('flightEdit', $flightsData -> getKey()) }}">Keisti</a><a class = "actual-delete-button" onclick="javascript:return confirm('Do you really want to delete this?')" href="{{route('deleteFlight',$flightsData->getKey())}}">Trinti</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class = "pages">
            {{$allFlights->links("pagination::bootstrap-4")}}
        </div>
        <div class= "crud-button-block">
            <button class = "add-button" type="button">Pildyti</button>
            <button class = "delete-button" type="button">Trinti</button>
            <button class = "change-button" type="button">Keisti</button>
        </div>
        <form class = "expanded-form-insert" method="post" action="{{ url('/admin/dashboard/insertFlight') }}"> {{csrf_field()}}
            <div class = "expanded-form-content">
                <div class = "expanded-form-header">
                    <span class = "expanded-close">&times</span>
                    <label class = "expanded-form-label">Naujas skrydis</label>
                </div>
                <div class = "expanded-form-body">
                    <div class = "expanded-inputs">
                        <label class = "expanded-label">Oro linijos:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="firm">
                        <div class="expanded-selects">
                            <label class = "expanded-label">Iš:</label>
                            <select class = "expanded-select" name="from">
                                @foreach($allPorts as $portsData )
                                    <option class = "expanded-option" value="{{$portsData->getKey()}}">{{$portsData->code}}</option>
                                @endforeach
                            </select>
                            <label class = "expanded-label">Į:</label>
                            <select class = "expanded-select" name="to">
                                @foreach($allPorts as $portsData )
                                    <option class = "expanded-option" value="{{$portsData->getKey()}}">{{$portsData->code}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="expaned-selects">
                            <label class = "expanded-label">Lėktuvas:</label>
                            <select id = "expanded-select-plane" name="plane">
                                @foreach($allPlanes as $planesData )
                                    <option class = "expanded-option" value="{{$planesData->getKey()}}">{{$planesData->id}}-{{$planesData->model}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label class = "expanded-label">Išvyksta:</label>
                        <input id = "expanded-duration" type = "datetime-local" autocomplete="off" name="departure">
                        <label class = "expanded-label">Atvyksta:</label>
                        <input id = "expanded-duration" type = "datetime-local" autocomplete="off" name="arrival">
                        <label class = "expanded-label">Vietų kiekis:</label>
                        <input id = "expanded-seats" type = "text" autocomplete="off" name="seats">
                        <div class = "expanded-form-button">
                            <button class = "expanded-button" type="submit">Patvirtinti</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

