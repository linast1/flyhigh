<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'FlyHigh') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
<div class = "wrapper">
    <login-main>
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
        <form class = "update-form" method="post" action="{{route('confirmFlightEdit', $selectedFlight -> getkey())}}"> {{csrf_field()}}
            <div class = "expanded-form-content">
                <div class = "expanded-form-header">
                    <label class = "expanded-form-label">Skrydžio redegavimas</label>
                </div>
                <div class = "expanded-form-body">
                    <div class = "expanded-inputs">
                        <label class = "expanded-label">Oro linijos:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="airline_name" value="{{ $selectedFlight->airline_name }}">
                                                <div class="expanded-selects">
                                                    <label class = "expanded-label">Iš:</label>
                                                    <select class = "expanded-select" name="fk_dep_airport">
                                                        @foreach($allPorts as $portsData )
                                                            <option class = "expanded-option" value="{{$portsData->getKey()}}" }} {{$portsData->getKey() == $selectedFlight->fk_dep_airport ? 'selected' : ''}}>{{$portsData->code}}</option>
                                                        @endforeach
                                                    </select>
                                                    <label class = "expanded-label">Į:</label>
                                                    <select class = "expanded-select" name="fk_arr_airport">
                                                        @foreach($allPorts as $portsData )
                                                            <option class = "expanded-option" value="{{$portsData->getKey()}}" {{$portsData->getKey() == $selectedFlight->fk_arr_airport ? 'selected' : ''}}>{{$portsData->code}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="expaned-selects">
                                                    <label class = "expanded-label">Lėktuvas:</label>
                                                    <select id = "expanded-select-plane" name="fk_plane">
                                                        @foreach($allPlanes as $planesData )
                                                            <option class = "expanded-option" value="{{$planesData->getKey()}}" {{$planesData->getKey() == $selectedFlight->fk_plane ? 'selected' : ''}}>{{$planesData->id}}-{{$planesData->model}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                        <label class = "expanded-label">Išvyksta:</label>
                        <input id = "expanded-duration" type = "datetime-local" autocomplete="off" name="departure_time" value="{{ str_replace(" ", "T", $selectedFlight->departure_time) }}">
                        <label class = "expanded-label">Atvyksta:</label>
                        <input id = "expanded-duration" type = "datetime-local" autocomplete="off" name="arrival_time" value="{{ str_replace(" ", "T", $selectedFlight->arrival_time) }}">
                        <label class = "expanded-label">Vietų kiekis:</label>
                        <input id = "expanded-seats" type = "text" autocomplete="off" name="seats" value="{{ $selectedFlight->seats }}">
                        <div class = "expanded-form-button">
                            <button class = "expanded-button" type="submit">Patvirtinti</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </login-main>
    <div class = "footer">
        FlyHigh © 2019
    </div>
</div>
</body>
</html>
