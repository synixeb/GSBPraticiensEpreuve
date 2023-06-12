<?php
namespace App\DAO;
use App\metier\Medicament;
use App\metier\Prescrire;
use Illuminate\Support\Facades\DB;
use App\Exceptions\MonException;
use Illuminate\Support\Facades\Session;
class ServiceMedicament
{
    public function getListeMedicaments()
    {
        try {
            $mesMed = DB::table('medicament')
                ->Select('id_medicament', 'nom_commercial')
                ->From('medicament')
                ->OrderBy('nom_commercial')
                ->get();
            return $mesMed;
        } catch (Exception $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function getListePraticiensParMedicament($idMed)
    {
        $lesPraticiens = DB::table('stats_prescriptions')
            ->Select('praticien.id_praticien', 'praticien.nom_praticien', 'praticien.prenom_praticien')
            ->From('stats_prescriptions')
            ->join('praticien', 'praticien.id_praticien', '=', 'stats_prescriptions.id_praticien')
            ->join('medicament', 'medicament.id_medicament', '=', 'stats_prescriptions.id_medicament')
            ->where('stats_prescriptions.id_medicament', '=', $idMed)
            ->OrderBy('praticien.nom_praticien')
            ->get();
        return $lesPraticiens;
    }

    public function getListeMedicamentsSanSPra()
    {
        //recupere le nom de tous les medicaments qui ne sont pas dans la table stats_prescriptions
        $lesMed = DB::table('medicament')
            ->whereNotExists(function ($query) {
                $query->select(DB::Raw(1))
                    ->from('stats_prescriptions')
                    ->whereRaw('stats_prescriptions.id_medicament = medicament.id_medicament');
            })
            ->get();
        return $lesMed;
    }
}
