<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Etudiant;
use App\Models\Groupe;
use App\Models\Formateur;
use App\Models\Formation;
use Illuminate\Http\Request;
use App\Http\Requests\formationrequest;
use App\Http\Requests\grouperequest;
use App\Http\Requests\seancerequest;
use App\Http\Requests\clientrequest;
use App\Models\Seance;

class AdminController extends Controller
{
    
    public function index(){
        $formationsCount = Formation::count();
        $etudiantsCount = Etudiant::count();
        $groupesCount = Groupe::count();
        return view('admins.index',['groupesCount'=>$groupesCount,'formationsCount'=>$formationsCount,'etudiantsCount'=>$etudiantsCount], compact('formationsCount', 'etudiantsCount'));
     }










}
