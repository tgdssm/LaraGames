@extends('layouts.app')
@section('content')
<div class="container col-md-6">
    <div class="card-group vgr-cards">
        <div class="card">
            <div class="card-img-body">
                <img class="card-img" src="{{ asset('storage/'.Str::after($game->photo, 'public/')) }}"
                    alt="Card image cap">
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
                <a href="{{ asset('storage/'.Str::after($game->torrent, 'public/')) }}" download="{{ $game->name }}"
                    class="btn btn-outline-primary">Download</a>
                @else
                <a href="{{ asset('storage/'.Str::after($game->torrent, 'public/')) }}" download="{{ $game->name }}"
                    class="btn btn-outline-primary">Download</a>
                @can('administrator', User::class)
                <a href="{{ route('game.edit', $game->id) }}" class="btn btn-outline-primary">Editar Informações</a>
                <form method="POST" action="{{ route('game.destroy', $game->id) }}" class="d-inline">
                    @csrf
                    {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-outline-primary"
                        onclick="return confirm('Tem certeza de que deseja excluir esse jogo?')">Excluir Jogo</button>

                </form>
                @endcan
                @endguest

            </div>
        </div>
    </div>
    <br>
    <div id="disqus_thread"></div>
    <script>
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://laragames.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by
            Disqus.</a></noscript>

    <script id="dsq-count-scr" src="//laragames.disqus.com/count.js" async></script>
</div>
@endsection