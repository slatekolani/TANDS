<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = Subscriber::latest('subscribed_at')->paginate(50);

        return view('admin.subscribers.index', compact('subscribers'));
    }

    public function export(): StreamedResponse
    {
        $subscribers = Subscriber::orderBy('email')->get();

        return response()->streamDownload(function () use ($subscribers) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, ['Email', 'Subscribed At', 'Active']);
            foreach ($subscribers as $subscriber) {
                fputcsv($handle, [
                    $subscriber->email,
                    optional($subscriber->subscribed_at)->format('Y-m-d H:i'),
                    $subscriber->is_active ? 'Yes' : 'No',
                ]);
            }
            fclose($handle);
        }, 'tands-subscribers.csv');
    }

    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return back()->with('status', 'Subscriber removed.');
    }
}
