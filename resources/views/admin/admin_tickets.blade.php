@extends('layouts.app')

@section('flights')
    <li class="nav-item">
        <a href="{{ url('admin/flights') }}">Skrydžiai</a>
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
        <label class =  "search-label"> VISI BILIETAI </label>
        <table id = "flights-table">
            <thead>
            <tr>
                <th>Kodas</th>
                <th>Savininko vardas</th>
                <th>Savninko pavardė</th>
                <th>Savininko el. paštas</th>
                <th>Vietos numeris</th>
                <th>Papildomas bagažas?</th>
                <th>Skrydžio nr.</th>
                <th id="update-hrow">Keisti?</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allTickets as $ticketsData )
                <tr>
                    <td>{{ $ticketsData -> code }}</td>
                    <td>{{ $ticketsData -> owner_name }}</td>
                    <td>{{ $ticketsData -> owner_surname }}</td>
                    <td>{{ $ticketsData -> owner_email }}</td>
                    <td>{{ $ticketsData -> seat_number }}</td>
                    <td>@if( ($ticketsData -> extra_baggage) == '1') Taip @else Nėra @endif</td>
                    <td>{{ $ticketsData -> fk_flight }}</td>
                    <td id="update-row"><a class = "update-button"  href="{{ route('ticketEdit', $ticketsData -> getKey()) }}">Keisti</a><a class = "actual-delete-button" onclick="javascript:return confirm('Do you really want to delete this?')" href="{{route('deleteTicket',$ticketsData->getKey())}}">Trinti</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class = "pages">
            {{$allTickets->links("pagination::bootstrap-4")}}
        </div>
        <div class= "crud-button-block">
            <button class = "add-button" type="button">Pildyti</button>
            <button class = "delete-button" type="button">Trinti</button>
            <button class = "change-button" type="button">Keisti</button>
        </div>
        <form class = "expanded-form-insert" method="post" action="{{ url('/admin/tickets/insertTicket') }}"> {{csrf_field()}}
            <div class = "expanded-form-content">
                <div class = "expanded-form-header">
                    <span class = "expanded-close">&times</span>
                    <label class = "expanded-form-label">Naujas bilietas</label>
                </div>
                <div class = "expanded-form-body">
                    <div class = "expanded-inputs">
                        <label class = "expanded-label">Savininko vardas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="owner_name" value="{{old('owner_name')}}">
                        <label class = "expanded-label">Savininko pavardė:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="owner_surname" value="{{old('owner_surname')}}">
                        <label class = "expanded-label">Savininko el. paštas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="owner_email" value="{{old('owner_email')}}">
                        <label class = "expanded-label">Vietos nr:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="seat_number" value="{{old('seat_number')}}">
                        <div class="expanded-selects">
                            <label class = "expanded-label">Papildomas bagažas?:</label>
                            <select class = "expanded-select" name="extra_baggage">
                                    <option class = "expanded-option" value="1" {{old('extra_baggage') == 1 ? 'selected' : ''}}>Taip</option>
                                    <option class = "expanded-option" value="0" {{old('extra_baggage') == 0 ? 'selected' : ''}}>Ne</option>
                            </select>
                        </div>
                        <div class="expanded-selects">
                            <label class = "expanded-label">Skrydžio id:</label>
                            <select id = "expanded-select-flight" name="fk_flight">
                                @foreach($allFlights as $flightsData )
                                    <option class = "expanded-option" value="{{$flightsData->getKey()}}" {{old('fk_flight') == $flightsData->getKey() ? 'selected' : ''}}>{{$flightsData->id}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class = "expanded-form-button">
                            <button class = "expanded-button" type="submit">Patvirtinti</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

