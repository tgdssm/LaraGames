@extends('layouts.app')
@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Novo Jogo') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('game.update', $game->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PUT') }}

                        @include('game.form')
                        
                        <a href="{{ route('game.show', $game->id) }}" class="btn btn-outline-danger d-inline">Cancelar</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection