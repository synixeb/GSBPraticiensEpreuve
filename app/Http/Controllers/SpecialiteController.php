<?php
namespace App\Http\Controllers;
use App\Exceptions\MonException;
use App\DAO\ServicePraticien;
use App\DAO\ServiceSpecialite;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

class SpecialiteController
{
    public function SpebyID($id){
        try {
            $uneSpe = new ServiceSpecialite();
            $mesSpe = $uneSpe->getListeSpe($id);
            $AllSpe = $uneSpe->SpeByID($id);
            Session::put('idPra', $id);
            return view('vues.listeSpe', compact('mesSpe' ,'AllSpe'));
        } catch (monException $e) {
            $monErreur = $e->getMessage();
            return view('vues.pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $Erreur = $e->getMessage();
            return view('vues.pageErreur', compact('Erreur'));
        }
    }

    public function suppr($id){
        try {
            $idPra=Session::get('idPra');
            $uneSuppr = new ServiceSpecialite();
            $uneSuppr->getSuppr($id);

            $unServiceSpe = new ServiceSpecialite();
            $mesSpe = $unServiceSpe->getListeSpe($idPra);

            $unServiceSpe = new ServiceSpecialite();
            $AllSpe = $unServiceSpe->AllSpe();
            return view('vues.listeSpe', compact('mesSpe', 'AllSpe'));
        } catch (monException $e) {
            $monErreur = $e->getMessage();
            return view('vues.pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $Erreur = $e->getMessage();
            return view('vues.pageErreur', compact('Erreur'));
        }
    }

    public function modifSpe($oldidSpe){
        try {
            Session::put('idSpe',$oldidSpe);
            $unServicePraticien = new ServicePraticien();
            $lesSpeDispo = $unServicePraticien->getSpecialite($oldidSpe);
            return view('vues.formModifSpe', compact('lesSpeDispo'));
        } catch (monException $e) {
            $monErreur = $e->getMessage();
            return view('vues.pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $Erreur = $e->getMessage();
            return view('vues.pageErreur', compact('Erreur'));
        }
    }

    public function postmodifSpe(){
        try {
            $idPraticien = Session::get('idPra');
            $idSpecialite = Request::input('idtype');
            $uneSpe = new ServiceSpecialite();
            $uneSpe->modifSpe($idPraticien, $idSpecialite);

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

    public function ajoutSpe(){
        try {
            $unServicePraticien = new ServicePraticien();
            $lesSpeDispo = $unServicePraticien->getSpecialite();
            return view('vues.formAjoutSpe', compact('lesSpeDispo'));
        } catch (monException $e) {
            $monErreur = $e->getMessage();
            return view('vues.pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $Erreur = $e->getMessage();
            return view('vues.pageErreur', compact('Erreur'));
        }
    }

    public function postAjout(){
        try {
            $idPra = Session::get('idPra');
            $idSpe = Request::input('idSpe');

            $unServiceSpe = new ServiceSpecialite();
            $unServiceSpe->getAjout($idPra ,$idSpe);

            $mesSpe = $unServiceSpe->getListeSpe($idPra);
            $AllSpe = $unServiceSpe->AllSpe();
            return view('vues.listeSpe', compact( 'mesSpe', 'AllSpe'));
        } catch (monException $e) {
            $monErreur = $e->getMessage();
            return view('vues.pageErreur', compact('monErreur'));
        } catch (Exception $e) {
            $Erreur = $e->getMessage();
            return view('vues.pageErreur', compact('Erreur'));
        }
    }
}
