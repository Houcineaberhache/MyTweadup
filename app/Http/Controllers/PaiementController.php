<?php

namespace App\Http\Controllers;
use App\Models\Paiementss;
use Illuminate\Support\Facades\Notification;
use App\Http\Requests\paiementrequest;
use App\Models\Formation;
use App\Models\Groupe;
use App\Http\Requests\clientrequest;
use App\Models\Admin;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use App\Notifications\paiement as NotificationsPaiement;

class PaiementController extends Controller
{
    
    protected $prix_total;
    protected $montant_paye;
    protected $reste_paiement;

    public function formulaireP(){
        $etudiants = Etudiant::all();
        $formations = Formation::all();
        $groupes = Groupe::all();
        return view('admins.addpaiement', ['etudiants' => $etudiants, 'formations' => $formations,'groupes'=>$groupes]);
    }

    public function listpaiement(){
        $paiements  = Paiementss::orderBy('created_at', 'desc')->paginate(10);
        $etudiants = Etudiant::all();
        $formations = Formation::all();
       
       return view('admins.paiementdashboard', ['etudiants' => $etudiants,'formations' => $formations],compact('paiements')); // ga3 l attributes 
    }
    public function destroypaiement (Paiementss $paiement){
        $paiement->delete();
        return to_route('paiement.dashboard')->with('success','Cet groupe est supprimé avec succès');
    }
    public function addpaiement(paiementrequest $request)
    {
        
        $formFields = $request->validated();
       
       
        
        // insertion  
        Paiementss::create($formFields);
      // echo calculePaiement($prix_total,$somme);
        return to_route('paiement.dashboard')->with('success','Nouvel  groupe est ajouté avec succès');
    }
    public function search(Request $request){

        $search = $request->search;

        $paiements =Paiementss::where(function($query) use ($search){

            $query->Where('created_at','like',"%$search%");
            })
            ->orWhereHas('formation',function($query)use($search){
                $query->where('titre','like',"%$search%");
            })
            ->orWhereHas('etudiant',function($query)use($search){
                $query->where('nom','like',"%$search%");
            })
            ->paginate(10);
             
            return view('admins.paiementdashboard',compact('paiements','search'));

    }
    public function editPaiement(Paiementss $paiement){
        $etudiants = Etudiant::all();
        $formations = Formation::all();
        $groupes = Groupe::all();
        return view('Modify.paiementEdite',['etudiants' => $etudiants, 'formations' => $formations,'groupes'=>$groupes],compact('paiement'));
    }
    public function updatePaiement(paiementrequest $paiementrequest,Paiementss $paiement){
        $formFields = $paiementrequest->validated();
        $paiement->fill($formFields)->save();
        return to_route('paiement.dashboard',$paiement->id)->with('success','Cet groupe est modifié avec succès
        ');
    }

}
