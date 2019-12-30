<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    protected $table = 'site_admin';
    protected $fillable = ['username', 'password'];
    public $timestamps = false;
}
