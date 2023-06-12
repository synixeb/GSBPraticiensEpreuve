<?php

namespace App\Metier;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use DB;

class Specialite
{
    protected $table = 'Specialite';
    public $timestamps =
        false;protected $fillable = [
    'id_specialite',
    'lib_specialite'
];
}


