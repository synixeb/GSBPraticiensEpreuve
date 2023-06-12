<?php

namespace App\Metier;

use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use DB;

class Praticien
{
protected $table = 'praticien';
public $timestamps =
false;protected $fillable = [
    'id_praticien',
    'id_type_praticien',
    'nom_praticien',
    'prenom_praticien',
    'adresse_praticien',
    'cp_praticien',
    'ville_praticien'];
}


