<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\seancerequest;
use App\Models\Seance;
use App\Models\Formateur;
use App\Models\Formation;
use Illuminate\Http\Request;

class SeanceController extends Controller
{
    public function addseance(seancerequest $request)
{
    $formFields = $request->validated();
    Seance::create($formFields);
    return to_route('seance.dashboard')->with('success','Nouvelle seance est ajoutée avec succès');
}
public function listseance(){
    $seances  = Seance::orderBy('created_at', 'desc')->paginate(10);
    $formateurs = Formateur::all();
    $formations = Formation::all(); // bach i3iyt l ga3 lines li f DB (select * from Profile)
   return view('admins.seancedashboard',['formateurs' => $formateurs,'formations'=>$formations],compact('seances')); // ga3 l attributes 
}
public function formulaireS(){
    $formateurs = Formateur::all();
    $formations = Formation::all();
    return view('admins.addseance', ['formateurs' => $formateurs, 'formations' => $formations]);
}
public function destroyseance (seance $seance){
    $seance->delete();
    return to_route('seance.dashboard')->with('success','Cette  seance  est supprimée avec succès');
}
    public function editSeance(Seance $seance){
        $formateurs = Formateur::all();
        $formations = Formation::all();
        return view('Modify.seanceEdite',['formateurs' => $formateurs, 'formations' => $formations],compact('seance'));
    }

    public function updateSeance(seancerequest $seancerequest,Seance $seance){
        $formFields = $seancerequest->validated();
        //hash
        $formFields['password'] = Hash::make($seancerequest->password);

        if (!$seancerequest->filled('password')) {
            unset($formFields['password']);
        }
       
        $seance->fill($formFields)->save();
        return to_route('seance.dashboard',$seance->id)->with('success','Cette seance est modifié avec succès');
    }
    public function search(Request $request){

        $search = $request->search;

        $seances = Seance::where(function($query) use ($search){

            $query->Where('date','like',"%$search%");
            
            })
            ->orWhereHas('formation',function($query)use($search){
                $query->where('titre','like',"%$search%");
            })
            ->paginate(10);
             
            return view('admins.seancedashboard',compact('seances','search'));

    }
}
