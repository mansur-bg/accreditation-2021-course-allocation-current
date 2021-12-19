<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LogoutController extends Controller
{
    public function index(Request $request)
    {
        Session::flush();
        Auth::guard('staff')->logout();
        $request->session()->regenerate();
//        Session::flash('succ_message', 'Logged out Successfully');
        $mbbits_message =
            [
                [
                    'key' => 'Logout Successful',
//                                    'value' => '<ul style="padding-left: 50px"><li>You do not</li><li>have the right priveleges</li>',
                    'value'=>'You have successfully logged out',
                    'type' => 'success',
                    'fa-icon'=>'fa fa-check'
                ],
//                                [
//                                    'key' => 'Valid Route',
//                                    'value' => 'You do not have the right priveleges',
//                                    'type' => 'success',
//                                    'fa-icon'=>'fa-user-plus'
//                                ]
        ]
        ;
        session()->flash('mbbits_message', $mbbits_message);

        return redirect()->action([\App\Http\Controllers\Staff\LoginController::class, 'index']);
    }
}
