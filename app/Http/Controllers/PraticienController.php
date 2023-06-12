<?php

namespace App\Http\Controllers;

use App\DAO\ServicePraticien;
use App\DAO\ServiceSpecialite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class PraticienController
{
    public function listerPraticiens()
    {
        try {
            $unPra = new ServicePraticien();
            $mesPra = $unPra->getListePraticiens();
            return view('vues.listePraticiens', compact('mesPra'));
        } catch (monException $e) {
            $monErreur = $e->getMessage();
            return view('vues.pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $Erreur = $e->getMessage();
            return view('vues.pageErreur', compact('Erreur'));
        }
    }

    public function postSearch(){
        try {
            $nom = Request::input("nom");

            $uneSpe = new ServiceSpecialite();
            $SearchSpe = $uneSpe->getSpeSearch($nom);

            $unPra = new ServicePraticien();
            $SearchPra = $unPra->getPraSearch($nom);
            return view('vues.SearchResult', compact('SearchSpe','SearchPra'));
        } catch (monException $e) {
            $monErreur = $e->getMessage();
            return view('vues.pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $Erreur = $e->getMessage();
            return view('vues.pageErreur', compact('Erreur'));
        }
    }
}
