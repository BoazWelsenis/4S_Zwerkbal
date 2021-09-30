@extends('layout')

@section('nav')
    <nav>
        <a href="/">Home</a>
        <a href="/tournaments" class="active">Toernooien</a>
        <a href="/teams">Teams</a>
        <a href="/players">Spelers</a>
    </nav>
@endsection

@section('content')

    <h1>Toernooien</h1>
    <a href="{{ route('tournaments.create') }}">+ nieuw toernooi</a>
    <table class="table">
        <tr>
            <th>Toernooi</th>
            <th>Datum</th>
            <th>Start-tijd</th>
            <th>&nbsp;</th>
        </tr>
        @foreach($tournaments as $tournament)
            <tr>
                <td>{{ ucfirst($tournament->name) }}</td>
                <!-- <td>{{ $tournament->date }}</td> -->
                <td>{{ date('d-m-Y', strtotime($tournament->date)) }}</td> <!-- Goede volgorde datum: https://stackoverflow.com/questions/50190058/change-date-format-in-blade-template  -->
                <td>{{ $tournament->start_time }}</td>
                <td><a href="{{ route('tournaments.edit', $tournament->id) }}">Aanpassen</a></td>
            </tr>
        @endforeach
    </table>
    
@endsection