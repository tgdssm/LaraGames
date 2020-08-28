<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Http\Requests\{
    GameRequest,
    UpdateGameRequest,
};
use Validator;
use App\User;
use DB;


class GameController extends Controller
{
    private $repository;
    public function __construct(Game $games)
    {
        $this->repository = $games;
        $this->middleware('recommendation');
        $this->middleware('auth')->except('index', 'show', 'search');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = $this->repository->paginate(3);
        return view('game.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('administrator', User::class);
        return view('game.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GameRequest $request)
    {
        $data = $request->except('photo', 'torrent');
        if($request->hasFile('photo'))
            $data['photo'] = $request->photo->store('public');
        if($request->hasFile('torrent'))
            $data['torrent'] = $request->torrent->store('public');
        
        $this->repository->create($data);

        return redirect()->route('game.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = $this->repository->findOrFail($id);
        return view('game.show', compact('game'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $game = $this->repository->findOrFail($id);
        $this->authorize('administrator', User::class);
        return view('game.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGameRequest $request, $id)
    {
        $game = $this->repository->find($id);
        $this->authorize('administrator', User::class);

        $data = $request->except('photo', 'torrent');
        if($request->hasFile('photo'))
            $data['photo'] = $request->photo->store('public');
        if($request->hasFile('torrent'))
            $data['torrent'] = $request->torrent->store('public');

        $game->update($data);

        return redirect()->route('game.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $game = $this->repository->find($id);
        $this->authorize('administrator', User::class);

        if ($game->delete())
            return redirect()->route('game.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $games = $this->repository->search($request->filter);
        return view('game.index', compact('games', 'filters'));
    }


}
