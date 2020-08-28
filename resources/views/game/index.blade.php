@extends('layouts.app')
@section('content')
{{-- <div class="card float-right mr-4" style="width: 18rem;">
    <div class="card-header">
      <h3>Mais Recentes</h3>
    </div>
    <ul class="list-group list-group-flush">
        @forelse ($games as $game)
        
      <li class="list-group-item"><a href="{{ route('game.show', $game->id) }}" class="text-dark">{{ $game->name }}</a></li>
            
        @empty
            
        @endforelse
    </ul>
  </div> --}}

    @forelse ($games as $game)
    <div class="container col-md-6">
        <div class="card-group vgr-cards">
            <div class="card">
                <div class="card-img-body">
                    <img class="card-img" src="{{ asset('storage/'.Str::after($game->photo, 'public/')) }}" alt="Card image cap">
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $game->name }}</h4>
                    <p class="card-text">{{ Str::substr($game->description, 0, 150).'...' }}</p>
                    <a href="{{ route('game.show', $game->id) }}" class="btn btn-outline-primary">Informações e Download</a>
                </div>
            </div>
        </div>
        <br>
        
    </div><br>
    @empty
    <div class="container col-md-6 bg-white d-flex justify-content-center align-items-center" style="height: 500px; border-radius: 5px;">
        <h1>NENHUM JOGO ENCONTRADO</h1>
    </div>
    @endforelse
    <div class="container d-flex justify-content-center align-items-center">
        @if (isset($filters))
            {!! $games->appends($filters)->links() !!}
        @else 
            {!! $games->links() !!}
        @endif
    </div>
@endsection