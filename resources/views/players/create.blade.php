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
	@if($errors->any())
		<ul class="errors">
			@foreach($errors->all() as $error)
				<li>{{$error}}</li>
			@endforeach
		</ul>
	@endif

    <h1>Nieuwe Speler</h1>
	<form action="{{ route('players.store') }}" method="POST">
		@csrf
		<div class="form-group">
			<label for="name">Naam</label>
			<input type="text" id="name" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label for="type">Type</label>
            
            <select name="type" id="type" class="form-control">
                <option value="chaser">Chaser</option>
                <option value="keeper">Keeper</option>
                <option value="beater">Beater</option>
                <option value="seeker">Seeker</option>
            </select>
		</div>
        <div class="form-group">
            <label for="team">Team</label>

            <select name="team" id="team" class="form-control">
                @foreach($teams as $team)
                    <option value="{{ $team->id }}"
                        @if($team->id == $team->team_id) selected @endif
                    >{{ $team->name }}</option>
                @endforeach
            </select>
        </div>
		<button type="submit">Opslaan</button>
	</form>
@endsection
