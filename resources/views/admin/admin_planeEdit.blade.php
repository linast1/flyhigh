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
        <form class = "update-form" method="post" action="{{route('confirmPlaneEdit', $selectedPlane -> getkey())}}"> {{csrf_field()}}
            <div class = "expanded-form-content">
                <div class = "expanded-form-header">
                    <label class = "expanded-form-label">Lėktuvo redegavimas</label>
                </div>
                <div class = "expanded-form-body">
                    <div class = "expanded-inputs">
                        <label class = "expanded-label">Modelis:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="model" value="{{ $selectedPlane->model}}">
                        <label class = "expanded-label">Kapitonas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="captain" value="{{ $selectedPlane->captain }}">
                        <label class = "expanded-label">Antrasis pilotas:</label>
                        <input id = "expanded-firm" type = "text" autocomplete="off" name="copilot" value="{{ $selectedPlane->copilot }}">
                        <label class = "expanded-label">Pagaminimo data:</label>
                        <input id = "expanded-duration" type = "date" autocomplete="off" name="make_date" value="{{ str_replace(" ", "T", $selectedPlane->make_date) }}">
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
