<?php

namespace App\Http\Controllers;
use App\Models\Formateur;
use App\Models\Formation;
use App\Http\Requests\formateurrequest;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class FormateurController extends Controller
{
    
public function listfrm (){
    $formateurs  = Formateur::orderBy('created_at', 'desc')->paginate(10); // bach i3iyt l ga3 lines li f DB (select * from Profile)
   return view('admins.frmdashboard',compact('formateurs')); // ga3 l attributes 
}

public function destroyformateur (formateur $formateur){
    $formateur->delete();
    return to_route('formateur.dashboard')->with('success','Cet formateur est supprimé avec succès.');
}
    public function editFormateur(Formateur $formateur){
        $formations = Formation::all();
        return view('Modify.formateurEdite',['formations'=>$formations],compact('formateur'));
    }

    public function updateFormateur(formateurrequest $formateurrequest,Formateur $formateur){
        $formFields = $formateurrequest->validated();
        //hash
        $formFields['password'] = Hash::make($formateurrequest->password);

        if (!$formateurrequest->filled('password')) {
            unset($formFields['password']);
        }
       
        $formateur->fill($formFields)->save();
        return to_route('formateur.dashboard',$formateur->id)->with('success','Ce formateur est modifié avec succès');
    }
    public function search(Request $request){

        $search = $request->search;

        $formateurs =Formateur::where(function($query) use ($search){

            $query->Where('CIN','like',"%$search%")
            ->orwhere('created_at','like',"%$search%");

            })
            ->paginate(10);
             
            return view('admins.frmdashboard',compact('formateurs','search'));

    }
    public function getFormations($id)
    {
        $formations = Formation::where('formateur_id', $id)->get(); // Assuming `formateur_id` is the foreign key in the `formations` table.
        return response()->json($formations);
    }
}
