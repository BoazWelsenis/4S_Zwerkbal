<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

//Importeer Teams, voor de create / store methode (door relatie in database)
use App\Models\Team;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return Player::all();
        $players = Player::all();
        return view('players/index')
            ->with('players', $players);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $teams = Team::all();
        return view('players/create')
            ->with('teams', $teams);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $player = new Player();
        $player->name = $request->name;
        $player->type = $request->type;
        $player->team_id = $request->team; //team haal je op uit de name van de select (de variabele voor de dropdown die een POST methode heeft)
        $player->save();
        
        return redirect()->route('players.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        $teams = Team::all();
        $current_team = Team::all()->where('id', '=', $player['team_id']); //https://laracasts.com/discuss/channels/eloquent/how-to-fetch-all-id-related-to-another-table
        return view('players/edit')
            ->with('teams', $teams)
            ->with('current_team', $current_team)
            ->with('player', $player);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        //
        $player->name = $request->name;
        $player->type = $request->type;
        $player->team_id = $request->team; 
        $player->save();
        
        return redirect()->route('players.index');
    }

    public function search(Request $request)
    {
        $player_search = $request->input('player_search'); //Laravel - Get Input Data Value in Controller: https://stackoverflow.com/questions/54285283/get-input-data-value-in-controller-in-laravel
        $player_result = Player::where('name', 'like', '%' .$player_search. '%')->get();

        return view('players.index')
            ->with('player_result', $player_result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }
}
