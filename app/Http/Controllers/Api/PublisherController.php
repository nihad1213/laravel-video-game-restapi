<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publisher;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Publisher::with('games')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'website' => 'nullable|url',
            'founded_year' => 'nullable|integer',
        ]);

        return Publisher::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        return $publisher->load('games');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publisher $publisher)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'website' => 'sometimes|nullable|url',
            'founded_year' => 'sometimes|nullable|integer',
        ]);

        $publisher->update($data);

        return $publisher;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return response()->json(null, 204);
    }
}
