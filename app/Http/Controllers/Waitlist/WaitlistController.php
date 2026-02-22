<?php

namespace App\Http\Controllers\Waitlist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Waitlist;

class WaitlistController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255', 'unique:waitlist_entries,email'],
        ]);

        $ipAddress = $request->ip();
        $email = $request->input('email');

        Waitlist::create([
            'ip_address' => $ipAddress,
            'email' => $email,
        ]);

        return redirect()
            ->route('success')
            ->with('success_data', [
                'title' => 'Subscription registered.',
                'lines' => [
                    'Queue status: empty.',
                    'Mail driver: imaginary.',
                    'Deployment target: nowhere.',
                ],
                'footer' => 'This is a test environment. No emails will be sent.',
            ]);
    }
}
