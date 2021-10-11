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

    <table class="table">
        <tr>
            <th>Naam</th>
            <th>Type</th>
            <th>Team</th>
        </tr>
        @foreach($players as $player)
            <tr>
                <td>{{ ucfirst($player->name) }}</td>
                <td>{{ ucfirst($player->type) }}</td>
                <td>{{ $player->team->name }}</td> <!-- team kent geen meervoud, omdat het geen array is -->
            </tr>
        @endforeach
    </table>

@endsection