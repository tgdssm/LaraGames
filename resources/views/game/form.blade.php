<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ isset($game->name)? $game->name : "" }}" required autocomplete="name" autofocus>

        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="genre" class="col-md-4 col-form-label text-md-right">{{ __('Gênero') }}</label>

    <div class="col-md-6">
        <input id="genre" type="text" class="form-control @error('genre') is-invalid @enderror" name="genre" value="{{ isset($game->genre)? $game->genre : "" }}" required autocomplete="genre">

        @error('genre')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="release" class="col-md-4 col-form-label text-md-right">{{ __('Ano de Lançamento') }}</label>

    <div class="col-md-6">
        <input id="release" type="text" class="form-control @error('release') is-invalid @enderror" name="release" value="{{ isset($game->release)? $game->release : "" }}" required autocomplete="release">

        @error('release')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="language" class="col-md-4 col-form-label text-md-right">{{ __('Idioma') }}</label>

    <div class="col-md-6">
        <input id="language" type="text" class="form-control @error('language') is-invalid @enderror" name="language" value="{{ isset($game->language)? $game->language : "" }}" required autocomplete="language">

        @error('language')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Tamanho') }}</label>

    <div class="col-md-6">
        <input id="size" type="text" class="form-control @error('size') is-invalid @enderror" name="size" value="{{ isset($game->size)? $game->size : "" }}" required autocomplete="size">

        @error('size')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="platform" class="col-md-4 col-form-label text-md-right">{{ __('Plataforma') }}</label>

    <div class="col-md-6">
        <input id="platform" type="text" class="form-control @error('platform') is-invalid @enderror" name="platform" value="{{ isset($game->platform)? $game->platform : "" }}" required autocomplete="platform">

        @error('platform')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

    <div class="col-md-6">
        <textarea name="description" id="description" cols="44" rows="2" class="form-control @error('description') is-invalid @enderror">
            {{ isset($game->description)? $game->description : "" }}
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </textarea>
    </div>
</div>

<div class="form-group row">
    <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Foto') }}</label>

    <div class="col-md-6">
        <input id="photo" type="file" class="form-control-file @error('photo') is-invalid @enderror" name="photo" value="{{ isset($game->photo)? $game->photo : "" }}" accept="image/png, image/jpeg">
        
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="torrent" class="col-md-4 col-form-label text-md-right">{{ __('Torrent') }}</label>

    <div class="col-md-6">
        <input id="torrent" type="file" class="form-control-file @error('torrent') is-invalid @enderror" name="torrent" value="{{ isset($game->torrent)? $game->torrent : "" }}" accept=".torrent">
        
        @error('torrent')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-6 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Registrar') }}
        </button>
    </div>
</div>