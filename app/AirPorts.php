<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AirPorts extends Model
{
    protected $table = 'airport';
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['code', 'city', 'country'];
    public $timestamps = false;

}
