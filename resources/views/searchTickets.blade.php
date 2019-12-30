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
                <p>Jūsų įvedamuose duomenyse yra klaidų:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class = "update-form" method="post" action="{{url('confirmPurchase')}}"> {{csrf_field()}}
            <div class = "expanded-form-content">
                <div class = "expanded-form-header">
                    <label class = "expanded-form-label">Bilieto pirkimas</label>
                </div>
                <div class = "expanded-form-body">
                    <div class = "expanded-inputs">
                        <label class = "expanded-label">Savininko vardas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="owner_name" value="{{$ownername}}">
                        <label class = "expanded-label">Savininko pavardė:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="owner_surname" value="{{$ownersurname}}">
                        <label class = "expanded-label">Savininko el. paštas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="owner_email" value="">
                        <label class = "expanded-label">Vietos nr:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="seat_number" value="">
                        <div class="expanded-selects">
                            <label class = "expanded-label">Papildomas bagažas?:</label>
                            <select class = "expanded-select" name="extra_baggage">
                                <option class = "expanded-option" value="1">Taip</option>
                                <option class = "expanded-option" value="0">Ne</option>
                            </select>
                        </div>
                        <div class="expanded-selects">
                            <label class = "expanded-label">Skrydžio id:</label>
                            <select id = "expanded-select-flight" name="fk_flight">
                                @foreach($selectedFlight as $flightsData )
                                    <option class = "expanded-option" value="{{$flightsData->getKey()}}">{{$flightsData->id}}</option>
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
    </login-main>
    <div class = "footer">
        FlyHigh © 2019
    </div>
</div>
</body>
</html>
