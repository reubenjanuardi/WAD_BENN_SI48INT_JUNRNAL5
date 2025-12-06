<?php

namespace App\Http\Controllers;

use App\Models\Dvd;
use Illuminate\Http\Request;

class DvdController extends Controller
{
    // GET /api/dvds
    public function index()
    {
        return response()->json(Dvd::all(), 200);
    }

    // POST /api/dvds
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'genre' => 'nullable|string|max:100',
            'release_year' => 'nullable|digits:4|integer',
            'rating' => 'nullable|string|max:10',
        ]);

        $dvd = Dvd::create($validated);

        return response()->json($dvd, 201);
    }

    // GET /api/dvds/{id}
    public function show($id)
    {
        $dvd = Dvd::findOrFail($id);
        return response()->json($dvd, 200);
    }

    // PUT /api/dvds/{id}
    public function update(Request $request, $id)
    {
        $dvd = Dvd::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'genre' => 'nullable|string|max:100',
            'release_year' => 'nullable|digits:4|integer',
            'rating' => 'nullable|string|max:10',
        ]);

        $dvd->update($validated);

        return response()->json($dvd, 200);
    }

    // DELETE /api/dvds/{id}
    public function destroy($id)
    {
        $dvd = Dvd::findOrFail($id);
        $dvd->delete();

        return response()->json(['message' => 'DVD deleted successfully'], 200);
    }
}
