<?php

namespace App\Http\Controllers;

use App\Mail\EventRegistrationConfirmation;
use App\Mail\EventRegistrationReceived;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class EventRegistrationController extends Controller
{
    public const CATEGORIES = ['Poetry', 'Quiz', 'Public Speaking', 'Debate'];

    public function store(Request $request, Event $event)
    {
        abort_unless($event->isRegistrationOpen(), 422, 'Registration is not open for this event.');

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'gender' => ['required', Rule::in(['Male', 'Female', 'Other'])],
            'age' => ['required', 'integer', 'min:5', 'max:100'],
            'school' => ['required', 'string', 'max:255'],
            'category' => ['required', Rule::in(self::CATEGORIES)],
            'amount_paid' => ['required', 'numeric', 'min:0'],
            'message' => ['nullable', 'string', 'max:2000'],
        ]);

        $registration = $event->registrations()->create($data);

        try {
            Mail::to($registration->email)->send(new EventRegistrationConfirmation($registration));
        } catch (\Throwable $e) {
            Log::warning('Event registration confirmation email failed to send: ' . $e->getMessage());
        }

        try {
            Mail::to(config('mail.contact_recipient'))->send(new EventRegistrationReceived($registration));
        } catch (\Throwable $e) {
            Log::warning('Event registration admin notification email failed to send: ' . $e->getMessage());
        }

        return response()->json(['message' => 'Your registration was received.']);
    }
}
