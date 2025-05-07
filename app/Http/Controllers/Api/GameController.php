<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Game;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Game::with(['genre', 'publisher'])->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release_date' => 'required|date',
            'publisher_id' => 'required|exists:publishers,id',
            'genre_id' => 'required|exists:genres,id',
        ]);


        return Game::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        return $game->load(['genre', 'publisher']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'release_date' => 'sometimes|required|date',
            'publisher_id' => 'sometimes|required|exists:publishers,id',
            'genre_id' => 'sometimes|required|exists:genres,id',
        ]);

        $game->update($data);

        return $game;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return response()->json(['message' => 'Game deleted successfully'], 204);
    }
}
