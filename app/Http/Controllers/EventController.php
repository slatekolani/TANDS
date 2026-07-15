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

        return view('FrontEnd.Events.show', compact('event'));
    }
}
