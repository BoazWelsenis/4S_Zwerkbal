<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Import Tournament, omdat je een de eerstvolgende wedstrijd wilt laten zien
use App\Models\Tournament;

class UpcomingTournamentController extends Controller
{
    //
    public function show()
    {
        $tournament = Tournament::where('date', '>', date("Y-m-d"))->orderBy('date')->limit(1)->first(); //Laat het eerste resultaat na vandaag, dan is het eerstvolgende toernooi
        return view('upcoming.index')
            ->with('tournament', $tournament);
    }
}
