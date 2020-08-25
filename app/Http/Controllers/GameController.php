<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Game;
use App\Http\Requests\GameRequest;
use Validator;


class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('alertlogin');
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::get();
        return view('game.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $game = new Game;
        $game->name = $request->name;
        $game->release = $request->release;
        $game->description = $request->description;
        $game->genre = $request->genre;
        $game->language = $request->language;
        $game->platform = $request->platform;
        $game->size = $request->size;
        if($request->hasFile('photo'))
            $game->photo = $request->photo->store('public');
        
        if($request->hasFile('torrent'))
            $game->torrent = $request->torrent->store('public');
        $game->save();

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
        $game = Game::findOrFail($id);
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
        $game = Game::findOrFail($id);
        return view('game.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $game = Game::find($id);

        Validator::make($request->all(), [
            'name' => ['required', 'string', 'min:3', 'max:200'],
            'genre' => ['string', 'min:3', 'max:100'],
            'description' => ['required', 'min: 10'],
            'language' => ['min:2'],
            'size' => ['required', 'min:1', 'max:10'],
            'release' => ['integer'],
            'platform' => ['required'],
        ])->validate();

        $game->name = $request->name;
        $game->release = $request->release;
        $game->description = $request->description;
        $game->genre = $request->genre;
        $game->language = $request->language;
        $game->platform = $request->platform;
        $game->size = $request->size;
        if($request->hasFile('photo'))
            $game->photo = $request->photo->store('public');
        
        if($request->hasFile('torrent'))
            $game->torrent = $request->torrent->store('public');
        $game->save();

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
        //
    }
}
