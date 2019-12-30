<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planes extends Model
{
    protected $table = 'plane';
    protected $fillable = ['model', 'captain', 'copilot', 'make_date'];
    public $timestamps = false;
}
