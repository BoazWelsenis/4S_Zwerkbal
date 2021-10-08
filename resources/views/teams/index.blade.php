<!-- hier komt een lijst van teams -->
@extends('layout')

@section('nav')
    <nav>
        <a href="/">Home</a>
        <a href="/tournaments">Toernooien</a>
        <a href="/teams" class="active">Teams</a>
        <a href="/players">Spelers</a>
    </nav>
@endsection

@section('content')

    <h1>Teams</h1>
    <a href="{{ route('teams.create') }}">+ nieuw team</a>

    <table class="table">
        <tr>
            <th>Team</th>
            <th>Soort</th>
            <th>Herkomst</th>
            <th>Spelers</th>
            <th>&nbsp;</th>
        </tr>
        @foreach($teams as $team)
            <tr>
                <td>{{ ucfirst($team->name) }}</td>
                <td>{{ ucfirst($team->type) }}</td>
                <td>{{ ucfirst($team->origin) }}</td>
                
                <td>
                @foreach($team->players as $team->player)
                    {{ $team->player->name }} ({{ $team->player->type }}) 
                    <br>
                @endforeach
                </td>

                <td><a href="">Aanpassen</a></td>
            </tr>
        @endforeach
    </table>

@endsection