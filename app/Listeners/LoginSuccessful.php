<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class LoginSuccessful
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        if (Auth::guard('staff')->check()) {
            $staff = Auth::guard('staff')->user();
            session()->put('staff_id', $staff->id);
            session()->put('staff_number', $staff->staff_number);
            session()->put('staff_name', trim($staff->title . " " . $staff->name));
            session()->put('staff_photo', $staff->photo);
            session()->put('staff_status', $staff->status);
            session()->put('staff_rank', $staff->rank);
            session()->put('staff_qualifications', $staff->qualifications);
            session()->put('staff_specialisation', $staff->specialisation);
            session()->put('staff_cadre', $staff->cadre);
            session()->flash('login-success', 'Hello ' . session('staff_name') . ', welcome back!');
        }
    }
}
