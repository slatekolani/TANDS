<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\RunsAfterResponse;
use App\Mail\SubscriberConfirmation;
use App\Mail\SubscriberReceived;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SubscriberController extends Controller
{
    use RunsAfterResponse;

    public function store(Request $request)
    {
        $data = $request->validate([
            'Email' => ['required', 'email', 'max:255'],
        ]);

        $subscriber = Subscriber::updateOrCreate(
            ['email' => $data['Email']],
            ['is_active' => true, 'subscribed_at' => now()]
        );

        return $this->respondThen(response()->json(['message' => 'Subscribed successfully.']), function () use ($subscriber) {
            try {
                Mail::to($subscriber->email)->send(new SubscriberConfirmation($subscriber));
            } catch (\Throwable $e) {
                Log::warning('Subscriber confirmation email failed to send: ' . $e->getMessage());
            }

            try {
                Mail::to(config('mail.contact_recipient'))->send(new SubscriberReceived($subscriber));
            } catch (\Throwable $e) {
                Log::warning('Subscriber admin notification email failed to send: ' . $e->getMessage());
            }
        });
    }
}
