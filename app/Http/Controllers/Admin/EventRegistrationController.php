<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventRegistration;
use Symfony\Component\HttpFoundation\StreamedResponse;

class EventRegistrationController extends Controller
{
    public function index(Event $event)
    {
        $registrations = $event->registrations()->paginate(50);

        return view('admin.events.registrations', compact('event', 'registrations'));
    }

    public function export(Event $event): StreamedResponse
    {
        $registrations = $event->registrations()->get();

        return response()->streamDownload(function () use ($registrations) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Name', 'Email', 'Phone', 'Gender', 'Age', 'School', 'Category', 'Amount Paid', 'Message', 'Registered At']);
            foreach ($registrations as $registration) {
                fputcsv($handle, [
                    $registration->name,
                    $registration->email,
                    $registration->phone,
                    $registration->gender,
                    $registration->age,
                    $registration->school,
                    $registration->category,
                    $registration->amount_paid,
                    $registration->message,
                    $registration->created_at->format('Y-m-d H:i'),
                ]);
            }
            fclose($handle);
        }, 'registrations-' . $event->slug . '.csv');
    }

    public function destroy(Event $event, EventRegistration $registration)
    {
        $registration->delete();

        return back()->with('status', 'Registration removed.');
    }
}
