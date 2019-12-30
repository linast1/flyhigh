<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flights extends Model
{
    protected $table = 'flight';
    protected $fillable = ['airline_name', 'departure_time', 'arrival_time', 'duration', 'seats', 'fk_arr_airport', 'fk_dep_airport', 'fk_plane'];
    public $timestamps = false;

}
