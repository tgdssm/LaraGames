@extends('layouts.app')
@section('content')
<div class="container col-md-6">
    <div class="card-group vgr-cards">
        <div class="card">
            <div class="card-img-body">
                <img class="card-img" src="{{ asset('storage/'.Str::after($game->photo, 'public/')) }}" alt="Card image cap">
            </div>
            <div class="card-body">
                <h4 class="card-title">{{ $game->name }}</h4>
                <p class="card-text">{{ $game->description }}</p>
                <hr class="my-4">
                <h4 class="card-title">Informações</h4>
                <p class="card-text">Gênero: {{ $game->genre }}</p>
                <p class="card-text">Ano de Lançamento: {{ $game->release }}</p>
                <p class="card-text">Idioma: {{ $game->language }}</p>
                <p class="card-text">Tamanho: {{ $game->size }}</p><br>
                @guest
                <a href="{{ asset('storage/'.Str::after($game->torrent, 'public/')) }}" download="{{ $game->name }}" class="btn btn-outline-primary">Download</a>
                @else
                <a href="{{ asset('storage/'.Str::after($game->torrent, 'public/')) }}" download="{{ $game->name }}" class="btn btn-outline-primary">Download</a>
                    <a href="{{ route('game.edit', $game->id) }}" class="btn btn-outline-primary">Editar Informações</a>
                @endguest
                
            </div>
        </div>
    </div>
</div>
@endsection