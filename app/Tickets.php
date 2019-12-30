<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $table = 'ticket';
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['code', 'owner_name', 'owner_surname', 'owner_email', 'seat_number', 'extra_baggage', 'fk_flight'];
    public $timestamps = false;
}
