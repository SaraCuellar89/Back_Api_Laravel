<?php
//encabezado
namespace App\Http\Controllers;//ruta

use App\Http\Controllers\Controller;//la clase base que heredan todos los controladores.
use Illuminate\Http\Request;//clase de Laravel que recoge y valida datos de formularios o peticiones.
use App\Models\Event;
use App\Models\Venue;


class EventController extends Controller // Crea la clase EventController, que manejará toda la lógica de los eventos
{
    public function index()
    {
        return Event::with('venue')->get();
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'date' => 'required|date',
            'venue_id' => 'required|exists:venues,id',
        ]);

        return Event::create($request->all());
    }

    public function show(string $id)
    {
        return Event::findOrFail($id);
    }

    public function update(Request $request, string $id)
    {
        $event = Event::findOrFail($id);
        $event->update($request->all());
        return $event;
    }

    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return response()->json(['message' => 'Evento eliminado']);
    }
}
