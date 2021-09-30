@extends('layout')

@section('nav')
    <nav>
        <a href="/">Home</a>
        <a href="/tournaments">Toernooien</a>
        <a href="/teams">Teams</a>
        <a href="/players">Spelers</a>
    </nav>
@endsection

@section('content')

    <h1>Eerstvolgende toernooi</h1>
    <p>Kom ook zwerkbal spelen op het volgende toernooi!</p>

    <div class="flex-row">
        <div class="upcoming-tournament yellow-border text-center font-size-30px">
            <h2>{{ $tournament->name }}</h2>
            <p>{{ date('d-m-Y', strtotime($tournament->date)) }} vanaf {{ $tournament->start_time }}</p>
        </div>
        <div class="snitch-img yellow-border">
            <img src="img/snitch.png" alt="snitch img">
        </div>
    </div>
    
@endsection
