@extends('layout')

@section('nav')
    <nav>
        <a href="/" class="active">Home</a>
        <a href="/tournaments">Toernooien</a>
        <a href="/teams">Teams</a>
        <a href="/players">Spelers</a>
    </nav>
@endsection

@section('content')

    <h1>Dashboard</h1>
    <p>Zwerkbal (Engels: Quidditch) is een sport voor tovenaars uit de Harray Potter boeken van Joanne Rowling. In de wereld van Harray Potter is Zwerkbal een populaire sport: veel mensen praten erover mee en zijn zeer enthousiast als er een groot toernooi wordt gespeeld. Ook heeft iedere heks of tovenaar wel een favoriet Zwerkbalteam. Het idee van Zwerkbal lijkt te zijn gebaseerd op het non-fictieve horseball.</p>

    <div class="index-grid">
        <div class="span-2-x yellow-border font-size-index">
            <p>Aantal aankomende toernooien:</p>
            <h3>5</h3>
        </div>
        <div class="snitch-img span-2-xy yellow-border">
            <img src="img/snitch.png" alt="snitch img">
        </div>
        <div class="span-2-x yellow-border font-size-index">
            <p>Totaal aantal teams:</p>
            <h3>26</h3>
        </div>
    </div>

@endsection