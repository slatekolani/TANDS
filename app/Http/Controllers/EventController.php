<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function show(Request $request, string $slug)
    {
        $event = Event::where('slug', $slug)->published()->firstOrFail();
        $event->load(['sections', 'galleryImages']);

        $otherEditions = $event->series
            ? Event::published()->where('series', $event->series)->whereKeyNot($event->id)->orderByDesc('year')->get()
            : collect();

        return view('FrontEnd.Events.show', compact('event', 'otherEditions'));
    }
}
