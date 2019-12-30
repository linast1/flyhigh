@extends('layouts.app')
@section('homeBtn')
    <li class="nav-item">
        <a href="{{ url('home') }}">Pirkti bilietą</a>
    </li>
@endsection
@section('flightsBtn')
    <li class="nav-item">
        <a href="{{ url('flights') }}">Skrydžiai</a>
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
@section('search')
    <div id = "ticket-search-block">
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
        <label class =  "search-label">BILIETO PAIEŠKA</label>
        <form method="get" class = "ticket-form" action="{{url('myTicket')}}">
            <div class = "ticket-form-block">
                <div class = "input-container">
                    <label class = "search-top">Įveskite savo bilieto kodą:</label>
                    <input id = "search-ticket" type = "text" autocomplete="off" name="code">
                </div>
            </div>
            <div class= "ticket-form-block">
                <button id = "search-ticket-button" type="submit">Ieškoti</button>
            </div>
        </form>
    </div>
@endsection
