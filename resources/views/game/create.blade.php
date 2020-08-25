@extends('layouts.app')
@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Novo Jogo') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('game.store') }}" enctype="multipart/form-data">
                        @csrf

                        @include('game.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection