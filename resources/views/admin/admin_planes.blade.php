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
@section('airports')
    <li class="nav-item">
        <a href="{{ url('admin/airports') }}">Oro uostai</a>
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
        <label class =  "search-label"> VISI LĖKTUVAI </label>
        <table id = "flights-table">
            <thead>
            <tr>
                <th>Modelis</th>
                <th>Kapitonas</th>
                <th>Antrasis pilotas</th>
                <th>Pagaminimo data</th>
                <th id="update-hrow">Keisti?</th>
            </tr>
            </thead>
            <tbody>
            @foreach($allPlanes as $planesData )
                <tr>
                    <td>{{ $planesData -> model }}</td>
                    <td>{{ $planesData -> captain }}</td>
                    <td>{{ $planesData -> copilot }}</td>
                    <td>{{ $planesData -> make_date }}
                    <td id="update-row"><a class = "update-button"  href="{{ route('planeEdit', $planesData -> getKey()) }}">Keisti</a><a class = "actual-delete-button" onclick="javascript:return confirm('Do you really want to delete this?')" href="{{route('deletePlane',$planesData->getKey())}}">Trinti</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class = "pages">
            {{$allPlanes->links("pagination::bootstrap-4")}}
        </div>
        <div class= "crud-button-block">
            <button class = "add-button" type="button">Pildyti</button>
            <button class = "delete-button" type="button">Trinti</button>
            <button class = "change-button" type="button">Keisti</button>
        </div>
        <form class = "expanded-form-insert" method="post" action="{{ url('/admin/planes/insertPlane') }}"> {{csrf_field()}}
            <div class = "expanded-form-content">
                <div class = "expanded-form-header">
                    <span class = "expanded-close">&times</span>
                    <label class = "expanded-form-label">Naujas lėktuvas</label>
                </div>
                <div class = "expanded-form-body">
                    <div class = "expanded-inputs">
                        <label class = "expanded-label">Modelis:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="model">
                        <label class = "expanded-label">Kapitonas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="captain">
                        <label class = "expanded-label">Antrasis pilotas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="copilot">
                        <label class = "expanded-label">Pagaminimo data:</label>
                        <input id = "expanded-duration" type = "date" autocomplete="off" name="make_date">
                        <div class = "expanded-form-button">
                            <button class = "expanded-button" type="submit">Patvirtinti</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

