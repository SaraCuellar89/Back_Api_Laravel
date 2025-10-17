<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Event;

class ParticipantController extends Controller
{

    public function index()
    {
        return Participant::with('event')->get();
    }


    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:64',
            'email' => 'required|email|max:64',
            'phone' => 'required|string|max:20',
            'event_id' => 'required|exists:events,id',
        ]);

        return Participant::create($request->all());
    }


    public function show(string $id)
    {
        return Participant::findOrFail($id);
    }


    public function update(Request $request, string $id)
    {
        $participant = Participant::findOrFail($id);
        $participant->update($request->all());
        return $participant;
    }


    public function destroy(string $id)
    {
        $participant = Participant::findOrFail($id);
        $participant->delete();
        return response()->noContent();

    }
    public function byEvent($eventId)
{
    return Participant::where('event_id', $eventId)->get();
}
}
