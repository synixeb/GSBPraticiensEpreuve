<?php

namespace App\Http\Controllers;
use App\DAO\ServiceMedicament;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
class MedicamentController
{
    public function listeMed(){
        $unMed = new ServiceMedicament();
        $mesMed = $unMed->getListeMedicaments();
        return view('vues.listeMedicaments', compact('mesMed'));
    }

    public function ListePraticienParMedicament(){
        $idMed = Request::input('idMed');

        $unMed = new ServiceMedicament();
        $mesPraticiens = $unMed->getListePraticiensParMedicament($idMed);
        return view('vues.listePraParMed', compact('mesPraticiens'));
    }

    public function MedicamentSansPraticien(){
        $unMed = new ServiceMedicament();
        $mesMed = $unMed->getListeMedicamentsSanSPra();
        return view('vues.MedicamentSansPraticiens', compact('mesMed'));
    }
}
