<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Importeer Team & Tournament Model
use App\Models\Team;
use App\Models\Tournament;

class HomeController extends Controller
{
    public function index()
    {
        //Wanneer je het aantal van iets wilt, gebruik dan de count() functie na (de voorwaarde in je) query:
        $amount_upcoming_tournaments = Tournament::where('date', '>', date("Y-m-d"))->orderBy('date')->count();
        $amount_teams = Team::where('id', '>', 0)->count();

        return view('home')
            ->with('amount_upcoming_tournaments', $amount_upcoming_tournaments)
            ->with('amount_teams', $amount_teams);
    }

    public function test()
    {
        $naam = "Boaz van Welsenis";
        return view('test')
            ->with('naam', $naam);
    }
}