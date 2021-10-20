@extends('layout')

@section('nav')
    <nav>
        <a href="/">Home</a>
        <a href="/tournaments">Toernooien</a>
        <a href="/teams">Teams</a>
        <a href="/players" class="active">Spelers</a>
    </nav>
@endsection

@section('content')

    <h1>Spelers</h1>
    <a href="{{ route('players.create') }}">+ nieuwe speler</a>

    <h2>Spelers zoeken</h2>
    <form action="/players/search" method="get" role="search">
        {{ csrf_field() }}
        <div class="input-group">
            <input type="text" class="form-control" name="player_search"
                placeholder="Zoek Spelers">
            <button type="submit" class="btn btn-default">
                <span class="glyphicon glyphicon-search">
                Zoeken
            </button>
            </span>
        </div>
    </form>

    <table class="table">
        <tr>
            <th>Naam</th>
            <th>Type</th>
            <th>Team</th>
            <th>&nbsp;</th>
        </tr>
        @if(isset($player_result))
            @foreach($player_result as $player)
                <tr>
                    <td>{{ ucfirst($player->name) }}</td>
                    <td>{{ ucfirst($player->type) }}</td>
                    <td>{{ ucfirst($player->team->name) }}</td> <!-- team kent geen meervoud, omdat het geen array is -->
                    <td><a href="{{ route('players.edit', $player->id) }}">Aanpassen</a></td>
                </tr>
            @endforeach
        @else
            @foreach($players as $player)
                <tr>
                    <td>{{ ucfirst($player->name) }}</td>
                    <td>{{ ucfirst($player->type) }}</td>
                    <td>{{ ucfirst($player->team->name) }}</td> <!-- team kent geen meervoud, omdat het geen array is -->
                    <td><a href="{{ route('players.edit', $player->id) }}">Aanpassen</a></td>
                </tr>
            @endforeach
        @endif
    </table>

@endsection

<!-- Search Functionality Laravel   : https://medium.com/justlaravel/search-functionality-in-laravel-a2527282150b -->
<!-- Laravel If / Else Statement    : https://stackoverflow.com/questions/40122633/if-else-condition-in-blade-file-laravel-5-3  -->