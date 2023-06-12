<?php
namespace App\DAO;
use App\Exceptions\MonException;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ServicePraticien
{
    public function getListePraticiens()
    {
        try{
            $mesPra= DB::table('praticien')
                ->Select('id_praticien', 'nom_praticien', 'prenom_praticien', 'ville_praticien', 'id_type_praticien')
                ->From('praticien')
                ->OrderBy('prenom_praticien')
                ->get();
            return $mesPra;
        }catch (Exception $e){
            throw new MonException($e->getMessage(),5);
        }
    }

    public function getSpecialite($idSpe){
        $lesSpe = DB::table('specialite')
            ->whereNotExists( function($query) use ($idSpe){
                $idPra=Session::get('idPra');
                $query->select(DB::Raw(1))
                    ->from('posseder')
                    ->whereRaw('posseder.id_specialite = specialite.id_specialite')
                    ->where('id_praticien', '=', $idPra);
            })
            ->get();
        Session::put('idSpe', $idSpe);
        return $lesSpe;
    }

    public function getPraSearch($nom){
        $results = DB::table('praticien')
            ->where('nom_praticien', 'LIKE', $nom.'%')
            ->get();
        return $results;
    }
}
