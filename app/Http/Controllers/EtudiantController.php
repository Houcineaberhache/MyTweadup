<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Groupe;
use App\Models\Etudiant;
use App\Models\Formation;
use App\Http\Requests\clientrequest;
class EtudiantController extends Controller
{
    public function editEtudiant(Etudiant $etudiant){
        $groupes = Groupe::all();
        $formations = Formation::all();
        return view('Modify.etudiantEdite',['groupes' => $groupes,'formations'=>$formations],compact('etudiant'));
    }

    public function updateEtudiant(clientrequest $clientrequest,Etudiant $etudiant){
        $formFields = $clientrequest->validated();
        //hash
        $formFields['password'] = Hash::make($clientrequest->password);

        if (!$clientrequest->filled('password')) {
            unset($formFields['password']);
        }
       
        $etudiant->fill($formFields)->save();
        return to_route('etudiant.dashboard',$etudiant->id)->with('success','Cet etudiant est modifié avec succès');
    }
    public function search(Request $request){

        $search = $request->search;

        $etudiants =Etudiant::where(function($query) use ($search){

            $query->Where('CIN','like',"%$search%")
            ->orwhere('created_at','like',"%$search%");

            })
            ->paginate(10);
             
            return view('admins.etddashboard',compact('etudiants','search'));

    }
    public function destroyetd (Etudiant $etudiant){
        $etudiant->delete();
        return to_route('admins.index')->with('success','Cet etudiant est supprimé avec succès.');
    }
     public function listetd (){
        $etudiants  = Etudiant::orderBy('created_at', 'desc')->paginate(10);
        $groupes=Groupe::all();
       return view('admins.etddashboard',['groupes' => $groupes],compact('etudiants')); // ga3 l attributes 
   }
}
