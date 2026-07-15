<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessageConfirmation;
use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'fullNames' => ['required', 'string', 'max:255'],
            'userEmail' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string'],
            'source' => ['nullable', 'string', 'max:50'],
        ]);

        $contactMessage = ContactMessage::create([
            'full_name' => $data['fullNames'],
            'email' => $data['userEmail'],
            'message' => $data['message'],
            'source' => $data['source'] ?? 'contact_page',
        ]);

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

        return response()->json(['message' => 'Your message was received.']);
    }
}
