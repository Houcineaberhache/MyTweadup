<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\formateurrequest;
use App\Http\Requests\grouperequest;
use App\Models\Groupe;
use App\Models\Formateur;
use App\Models\Formation;

class GroupesController extends Controller
{
    public function listgroupe(){
        $groupes  = Groupe::orderBy('created_at', 'desc')->paginate(10);
        $formateurs = Formateur::all();
        $formations = Formation::get();
       return view('admins.groupedashboard', ['formateurs' => $formateurs, 'formations' => $formations],compact('groupes')); // ga3 l attributes 
    }
    public function addgroupe(grouperequest $request)
    {
        $formFields = $request->validated();
        // insertion  
        Groupe::create($formFields);
        $formateurs = Formateur::all();
        $formations = Formation::all();
    
        return to_route('groupe.dashboard',['formateurs' => $formateurs, 'formations' => $formations])->with('success','Nouvel groupe est ajoutée avec succès.');
    }
    public function destroygroupe (groupe $groupe){
        $groupe->delete();
        return to_route('groupe.dashboard')->with('success','Cet groupe est supprimé avec succès.');
    }
    public function formulaireG(){
        $formateurs = Formateur::all();
        $formations = Formation::all();
        return view('admins.addgroupe', ['formateurs' => $formateurs, 'formations' => $formations]);
    }
    public function index(){
        $formateurs = Formateur::all();
        $formations = Formation::all();
        
        return view('admins.addgroupe', ['formateurs' => $formateurs, 'formations' => $formations],compact('formateurs','formations'));
    }
    
    public function search(Request $request){

        $search = $request->search;

        $groupes =Groupe::where(function($query) use ($search){

            $query->Where('created_at','like',"%$search%");


            })
            ->orWhereHas('formation',function($query)use($search){
                $query->where('titre','like',"%$search%");
            })
            ->paginate(10);
             
            return view('admins.groupedashboard',compact('groupes','search'));

    }
    public function editGroupe(Groupe $groupe){
        $formateurs = Formateur::all();
        $formations = Formation::all();
        return view('Modify.groupeEdite',['formateurs' => $formateurs, 'formations' => $formations],compact('groupe'));
    }

    public function updateGroupe(grouperequest $grouperequest,Groupe $groupe){
        $formFields = $grouperequest->validated();

     
        $groupe->fill($formFields)->save();
        return to_route('groupe.dashboard',$groupe->id)->with('success','Ce groupe est modifié avec succès');
    }
    public function getFormations($id)
    {
        $formations = Formation::where('formateur_id', $id)->get();
        return response()->json($formations);
    }

}
