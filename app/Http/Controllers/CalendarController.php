<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Formation;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
{
    $events = [];
    $formations = Formation::all();

    foreach ($formations as $formation) {
        $events[] =[
            'id' => $formation->id,
            'title' => $formation->titre,
            'start' => $formation->date_debut,
            'end' => $formation->date_fin, 
            'groupName' => $formation->group->nom_groupe,
        ];
    }

    return view('calendar.index',compact('events'), ['events' => $events]);
}
}