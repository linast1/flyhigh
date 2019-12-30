@extends('layouts.app')

@section('flights')
    <li class="nav-item">
        <a href="{{ url('admin/flights') }}">Skrydžiai</a>
    </li>
@endsection
@section('tickets')
    <li class="nav-item">
        <a href="{{ url('admin/tickets') }}">Bilietai</a>
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
        <label class =  "search-label"> VISI ORO UOSTAI </label>
        <table id = "flights-table">
            <thead>
            <tr>
                <th>Kodas</th>
                <th>Miestas</th>
                <th>Šalis</th>
                <th id="update-hrow">Keisti?</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allPorts as $portsData )
                <tr>
                    <td>{{ $portsData -> code }}</td>
                    <td>{{ $portsData -> city }}</td>
                    <td>{{ $portsData -> country }}</td>
                    <td id="update-row"><a class = "update-button"  href="{{ route('airportEdit', $portsData -> getKey()) }}">Keisti</a><a class = "actual-delete-button" onclick="javascript:return confirm('Do you really want to delete this?')" href="{{route('deleteAirport',$portsData->getKey())}}">Trinti</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class = "pages">
            {{$allPorts->links("pagination::bootstrap-4")}}
        </div>
        <div class= "crud-button-block">
            <button class = "add-button" type="button">Pildyti</button>
            <button class = "delete-button" type="button">Trinti</button>
            <button class = "change-button" type="button">Keisti</button>
        </div>
        <form class = "expanded-form-insert" method="post" action="{{ url('/admin/airports/insertAirport') }}"> {{csrf_field()}}
            <div class = "expanded-form-content">
                <div class = "expanded-form-header">
                    <span class = "expanded-close">&times</span>
                    <label class = "expanded-form-label">Naujas oro uostas</label>
                </div>
                <div class = "expanded-form-body">
                    <div class = "expanded-inputs">
                        <label class = "expanded-label">Kodas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="code">
                        <label class = "expanded-label">Miestas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="city">
                        <label class = "expanded-label">Šalis:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="country">
                        <div class = "expanded-form-button">
                            <button class = "expanded-button" type="submit">Patvirtinti</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

