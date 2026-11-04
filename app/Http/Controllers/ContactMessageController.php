<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\RunsAfterResponse;
use App\Mail\ContactMessageConfirmation;
use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    use RunsAfterResponse;

    public function store(Request $request)
    {
        $data = $request->validate([
            'fullNames' => ['required', 'string', 'max:255'],
            'userEmail' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string'],
            'source' => ['nullable', 'string', 'max:50'],
        ]);

        // Saved first, so it is always on the dashboard even if email fails.
        $contactMessage = ContactMessage::create([
            'full_name' => $data['fullNames'],
            'email' => $data['userEmail'],
            'message' => $data['message'],
            'source' => $data['source'] ?? 'contact_page',
        ]);

        return $this->respondThen(response()->json(['message' => 'Your message was received.']), function () use ($contactMessage) {
            try {
                Mail::to($contactMessage->email)->send(new ContactMessageConfirmation($contactMessage));
            } catch (\Throwable $e) {
                Log::warning('Contact message confirmation email failed to send: ' . $e->getMessage());
            }

            try {
                Mail::to(config('mail.contact_recipient'))->send(new ContactMessageReceived($contactMessage));
                $contactMessage->update(['email_sent' => true]);
            } catch (\Throwable $e) {
                Log::warning('Contact message admin notification email failed to send: ' . $e->getMessage());
            }
        });
    }
}
