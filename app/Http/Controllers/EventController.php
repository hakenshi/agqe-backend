<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
    {
        return EventResource::collection(Event::all());
    }

    public function store(StoreEventRequest $request)
    {
        $event = Event::create([
            'name' => $request->name,
            'cover_image' => $request->cover_image,
            'event_type' => $request->event_type,
            'slug' => Str::slug($request->name),
            'date' => $request->date,
            'starting_time' => $request->starting_time,
            'ending_time' => $request->ending_time,
            'location' => $request->location,
            'markdown' => $request->markdown,
        ]);

        return new EventResource($event);
    }

    public function show(Event $event)
    {
        return new EventResource($event);
    }

    public function showBySlug($slug)
    {
        $event = Event::where('slug', $slug)->firstOrFail();
        return new EventResource($event);
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $data = $request->only(['name', 'event_type', 'date', 'starting_time', 'ending_time', 'location', 'markdown']);
        
        if ($request->filled('name')) {
            $data['slug'] = Str::slug($request->name);
        }

        if ($request->filled('cover_image')) {
            $data['cover_image'] = $request->cover_image;
        }

        $event->update($data);

        return new EventResource($event);
    }

    public function destroy(Event $event)
    {
        // Image deletion handled by frontend/Cloudflare R2

        $event->delete();

        return new EventResource($event);
    }
}