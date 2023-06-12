<?php
namespace App\Metier;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use DB;

class Medicament
{
    public $timestamps =
        false;
    protected $fillable = [
        'id_medicament',
        'nom_commercial'];
}






