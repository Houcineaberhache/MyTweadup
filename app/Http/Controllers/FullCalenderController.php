<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Formation;  
use App\Http\Requests\formationrequest;

class FullCalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = [];
        $formations = Formation::all();
        foreach ($formations as $formation) {
            $color= null;
            // if ($formation->couleur == 'rouge'){
            //     $color = '#931F1D';
            // }
            switch($formation->couleur) {
                 case 'rouge':
                         $color = '#DE3163';
                        //return 'black'; // rouge
                        break;
                    case 'vert':
                        $color = '#1ABC9C'; // vert
                        break;
                    case 'cyan':
                        $color = '#40E0D0'; // bleu
                        break;
                    case 'bleu':
                        $color = '#6495ED'; // bleu
                        break;
                    case 'violet':
                        $color = '#CCCCFF'; // jaune
                        break;
                    case 'orange':
                        $color = '#FF7F50'; // jaune
                        break;
                    case 'jaune':
                        $color = '#FFC300'; // jaune
                        break;
                    // Add more cases for other colors as needed
                    default:
                        $color = '#CD1FF4'; // Default color
                    }
            $events[] = [
                'id' => $formation->id,
                'title' => $formation->titre,
                'start' => $formation->date_debut,
                'end' => $formation->date_fin,
                'color' => $color, // Assign color based on condition
            ];
        }
    
        return view('calendar.index', compact('events'));
    }


}
