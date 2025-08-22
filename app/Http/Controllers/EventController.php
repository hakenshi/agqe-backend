<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        return response()->json(Event::all());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'event_type' => 'required|in:gallery,event,event_gallery',
            'date' => 'required|date',
            'starting_time' => 'required|date_format:H:i',
            'ending_time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'markdown' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $coverImagePath = $request->file('cover_image')->store('events', 'public');

        $event = Event::create([
            'name' => $request->name,
            'cover_image' => $coverImagePath,
            'event_type' => $request->event_type,
            'date' => $request->date,
            'starting_time' => $request->starting_time,
            'ending_time' => $request->ending_time,
            'location' => $request->location,
            'markdown' => $request->markdown,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Evento criado com sucesso',
            'event' => $event,
        ], 201);
    }

    public function show(Event $event)
    {
        return response()->json($event);
    }

    public function update(Request $request, Event $event)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'cover_image' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
            'event_type' => 'sometimes|in:gallery,event,event_gallery',
            'date' => 'sometimes|date',
            'starting_time' => 'sometimes|date_format:H:i',
            'ending_time' => 'sometimes|date_format:H:i',
            'location' => 'sometimes|string|max:255',
            'markdown' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->only(['name', 'event_type', 'date', 'starting_time', 'ending_time', 'location', 'markdown']);

        if ($request->hasFile('cover_image')) {
            if ($event->cover_image) {
                Storage::disk('public')->delete($event->cover_image);
            }
            $data['cover_image'] = $request->file('cover_image')->store('events', 'public');
        }

        $event->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Evento atualizado com sucesso',
            'event' => $event,
        ]);
    }

    public function destroy(Event $event)
    {
        if ($event->cover_image) {
            Storage::disk('public')->delete($event->cover_image);
        }

        $event->delete();

        return response()->json([
            'success' => true,
            'message' => 'Evento excluído com sucesso',
        ]);
    }
}