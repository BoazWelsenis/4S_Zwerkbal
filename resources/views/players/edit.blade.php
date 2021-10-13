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
    <h1>Speler aanpassen</h1>

	<form action="{{ route('players.update', $player) }}" method="POST">
		@csrf
        @method('PUT')
		<div class="form-group">
			<label for="name">Naam</label>
			<input type="text" id="name" name="name" class="form-control" value="{{ $player->name }}">
		</div>
        <div class="form-group">
            <label for="type">Type</label>

            <!-- https://www.youtube.com/watch?v=rSJgTaIIh6E + https://nl.wikipedia.org/wiki/Quidditch_(sport) -->
            <select name="type" id="type" class="form-control">
                <option value="chaser" {{ $player->type == "chaser" ? 'selected' : '' }}>Chaser</option>
                <option value="keeper" {{ $player->type == "keeper" ? 'selected' : '' }}>Keeper</option>
                <option value="beater" {{ $player->type == "beater" ? 'selected' : '' }}>Beater</option>
                <option value="seeker" {{ $player->type == "seeker" ? 'selected' : '' }}>Seeker</option>

            <!-- <option value="chaser">Chaser</option>
                <option value="keeper">Keeper</option>
                <option value="beater">Beater</option>
                <option value="seeker">Seeker</option> -->
            </select>
		</div>
        <div class="form-group">
            <label for="team">Team</label>

            <!-- https://stackoverflow.com/questions/50970020/how-to-show-selected-value-from-database-in-dropdown-using-laravel -->
            <select name="team" id="team" class="form-control">
                @foreach($teams as $team)
                    <!-- Player kan gebruikt worden, door Parameter in Edit Methode, dit is nodig voor de Controle en de Selected Item uit de Database te halen: https://stackoverflow.com/questions/68117218/trying-to-make-select-option-to-work-in-livewire -->`
                    <option value="{{ $team->id }}" {{ $player->team_id == $team->id  ? 'selected' : '' }}>{{ $team->name }}</option> 

                    
                    <!-- <option value="{{ $team->current_team }}" {{ $player->team_id == $team->id  ? 'selected' : ''}}>{{ $team->name }}</option> -->
                    <!-- <option value="{{ $team->id }}"
                        @if($team->id == $team->team_id) selected @endif
                    >{{ $team->name }}</option> -->
                @endforeach

            </select>
        </div>
		<button type="submit">Opslaan</button>
	</form>
@endsection
