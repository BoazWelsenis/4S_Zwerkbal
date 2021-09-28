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
	@if($errors->any())
		<ul class="errors">
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif


    <h1>Nieuw toernooi</h1>
	<form action="{{ route('tournaments.store') }}" method="POST">
		@csrf
		<div class="form-group">
			<label for="name">Naam toernooi</label>
			<input type="text" id="name" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label for="date">Date</label>
			<input type="date" id="date" name="date" class="form-control">
		</div>
		<div class="form-group">
			<label for="start_time">Time</label>
			<input type="time" id="time" name="start_time" class="form-control">
		</div>
		<button type="submit">Opslaan</button>
	</form>
@endsection
