<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\formationrequest;
use App\Models\Formation;
use App\Models\Groupe;
use Illuminate\Http\Request;

class FormationController extends Controller
{
    public function listformation(){
        $formations  = Formation::orderBy('created_at', 'desc')->paginate(10);
        $groupes  = Groupe::all(); // bach i3iyt l ga3 lines li f DB (select * from Profile)
       return view('admins.formationdashboard',compact('formations'),['groupes' => $groupes]); // ga3 l attributes 
    }
    public function addformation(FormationRequest $request)
    {
       
        $formations  = Formation::paginate(5);
        // Validate the incoming request data based on the FormationRequest rules
        $validatedData = $request->validated();
        if (empty($validatedData['groupe_id'])) {
            return back()->withErrors(['groupe_id' => 'Groupe is required'])->withInput();
        }
        // Format date_debut and date_fin to yyyy-mm-dd format
        $validatedData['date_debut'] = date('Y-m-d', strtotime($validatedData['date_debut']));
        $validatedData['date_fin'] = date('Y-m-d', strtotime($validatedData['date_fin']));
      
        // Create a new Formation instance and fill it with validated data
        $formation = Formation::create($validatedData);
    
        // Redirect back to the index page with a success message
        return redirect()->route('calendar.index',['formation' => $formation])->with('success', 'Nouvelle  formation est ajouté avec succès.');
    }
    public function formulaireForm(){
        $groupes  = Groupe::all();
        return view('admins.addformation', ['groupes' => $groupes]);
    }
    public function destroyformation (formation $formation){
        $formation->delete();
        return to_route('formation.dashboard')->with('success','Cette formation est supprimé avec succès.');
    }
    public function editFormation(Formation $formation){
        $groupes=Groupe::all();
        return view('Modify.formationEdite',['groupes' => $groupes],compact('formation'));
    }

    public function updateFormation(formationrequest $formationrequest,Formation $formation){
        $formFields = $formationrequest->validated();

        if (empty($formFields['groupe_id'])) {
            return back()->withErrors(['groupe_id' => 'Groupe is required'])->withInput();
        }
        $formation->fill($formFields)->save();
        return to_route('formation.dashboard',$formation->id)->with('success','Cette formation est modifié avec succès');
    }
    public function search(Request $request){

        $search = $request->search;

        $formations =Formation::where(function($query) use ($search){

            $query->Where('date_debut','like',"%$search%")
            ->orwhere('created_at','like',"%$search%")
            ->orwhere('titre','like',"%$search%");

            })
            ->paginate(10);
             
            return view('admins.formationdashboard',compact('formations','search'));

    }
}
