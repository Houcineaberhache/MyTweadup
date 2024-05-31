<?php

namespace App\Http\Controllers;
use App\Http\Requests\depenserequest;
use App\Models\Depense;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class DepenceController extends Controller
{
 
    public function storeDepense(depenserequest $depenserequest)
    {
        $validatedData = $depenserequest->validate([
            'categorie_depense' => 'required',
            'montant_depense' => 'required',
            'nature_depense' => 'nullable',
        ]);
        $depense = new Depense();
        $depense->categorie_depense = $validatedData['categorie_depense'];
        $depense->montant_depense = $validatedData['montant_depense'];
        
            $depense->nature_depense = $validatedData['nature_depense']; // Set nature_depense if category is "divers"
        

        // Save the Depense instance to the database
        $depense->save();
        return to_route('depense.dashboard')->with('success','Nouvelle dépense est ajoutée avec succès.');
    }
    public function listdepenses(){
        
        $depenses  = Depense::orderBy('created_at', 'desc')->paginate(10);
       return view('admins.depensesdashboard',compact('depenses')); // ga3 l attributes 
    }
    public function destroydepense (Depense $depense){
        $depense->delete();
        return to_route('depense.dashboard')->with('success','Cette dépense est supprimée avec succès');
    }
    public function editDepense(Depense $depense){
        return view('Modify.depenseEdite',compact('depense'));
    }

    public function updateDepense(depenserequest $depenserequest,Depense $depense){
        $formFields = $depenserequest->validated();
        $depense->fill($formFields)->save();
        return to_route('depense.dashboard',$depense->id)->with('success','Cette dépense est modifié avec succès');
    }
    public function search(Request $request){

        $search = $request->search;

        $depenses =Depense::where(function($query) use ($search){

            $query->Where('nature_depense','like',"%$search%")
            ->orwhere('created_at','like',"%$search%")
            ->orwhere('categorie_depense','like',"%$search%");
            })
            ->paginate(10);
             
            return view('admins.depensesdashboard',compact('depenses','search'));

    }
}
