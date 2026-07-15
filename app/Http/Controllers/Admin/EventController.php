<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Concerns\ManagesUploads;
use App\Http\Controllers\Controller;
use App\Mail\EventPublishedAnnouncement;
use App\Models\Event;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class EventController extends Controller
{
    use ManagesUploads;

    public function index()
    {
        $events = Event::orderByDesc('event_date')->orderBy('title')->paginate(20);

        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        $existingSeries = $this->existingSeries();

        return view('admin.events.create', compact('existingSeries'));
    }

    public function store(Request $request)
    {
        $data = $this->validated($request);

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $this->uploadImage($request->file('banner_image'), 'events');
        }

        $event = Event::create($data);

        dispatch(fn () => $this->announceIfNeeded($event))->afterResponse();

        return redirect()->route('admin.events.edit', $event)->with('status', 'Event created. Add sections and gallery images below.');
    }

    public function edit(Event $event)
    {
        $event->load(['sections', 'galleryImages']);
        $existingSeries = $this->existingSeries();

        return view('admin.events.edit', compact('event', 'existingSeries'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $this->validated($request, $event);

        if ($request->hasFile('banner_image')) {
            $this->deleteImage($event->banner_image);
            $data['banner_image'] = $this->uploadImage($request->file('banner_image'), 'events');
        }

        $event->update($data);

        dispatch(fn () => $this->announceIfNeeded($event))->afterResponse();

        return redirect()->route('admin.events.edit', $event)->with('status', 'Event updated.');
    }

    public function destroy(Event $event)
    {
        foreach ($event->galleryImages as $image) {
            $this->deleteImage($image->image_path);
        }
        $this->deleteImage($event->banner_image);
        $event->delete();

        return redirect()->route('admin.events.index')->with('status', 'Event deleted.');
    }

    /**
     * Broadcast a newly-published event to every active subscriber, once.
     * Guarded by announced_at so later edits never re-trigger it.
     */
    private function announceIfNeeded(Event $event): void
    {
        if (! $event->needsPublishAnnouncement()) {
            return;
        }

        $emails = Subscriber::where('is_active', true)->pluck('email');

        foreach ($emails->chunk(30) as $batch) {
            try {
                Mail::to(config('mail.contact_recipient'))
                    ->bcc($batch->all())
                    ->send(new EventPublishedAnnouncement($event));
            } catch (\Throwable $e) {
                Log::warning('Event announcement email failed to send to a subscriber batch: ' . $e->getMessage());
            }
        }

        $event->announced_at = now();
        $event->save();
    }

    /**
     * Distinct series codes already in use, so the admin picks one instead
     * of retyping it — a typo or stray space here used to create a whole
     * new top-level entry in the public nav instead of joining the
     * existing series group.
     */
    private function existingSeries()
    {
        return Event::whereNotNull('series')->where('series', '!=', '')
            ->distinct()->orderBy('series')->pluck('series');
    }

    private function validated(Request $request, ?Event $event = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => [
                'required', 'string', 'max:255', 'alpha_dash',
                Rule::unique('events', 'slug')->ignore($event?->id),
            ],
            'series' => ['nullable', 'string', 'max:50'],
            'year' => ['nullable', 'string', 'max:10'],
            'theme' => ['nullable', 'string', 'max:255'],
            'status' => ['required', Rule::in(['upcoming', 'ongoing', 'past'])],
            'event_date' => ['nullable', 'date'],
            'location' => ['nullable', 'string', 'max:255'],
            'banner_image' => ['nullable', 'image', 'max:5120'],
            'description' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string', 'max:255'],
            'is_published' => ['sometimes', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]) + ['is_published' => $request->boolean('is_published')];

        $data['series'] = $data['series'] ? trim($data['series']) : null;

        return $data;
    }
}
