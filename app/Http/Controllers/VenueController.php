<?php

namespace App\Http\Controllers;

use App\Models\Venue;
use Illuminate\Http\Request;

class VenueController extends Controller
{
    // GET /venues
    public function index()
    {
        return Venue::all();
    }

    // POST /venues
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:64',
            'location' => 'required|string|max:64',
        ]);

        return Venue::create($request->all());
    }

    // GET /venues/{id}
    public function show($id)
    {
        return Venue::findOrFail($id);
    }

    // PUT /venues/{id}
    public function update(Request $request, $id)
    {
        $venue = Venue::findOrFail($id);
        $venue->update($request->all());

        return $venue;
    }

    // DELETE /venues/{id}
    public function destroy($id)
    {
        $venue = Venue::findOrFail($id);
        $venue->delete();

        return response()->json(['message' => 'Sede eliminada']);
    }
}