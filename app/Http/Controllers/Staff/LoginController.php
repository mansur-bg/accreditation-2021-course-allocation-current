<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffLoginPostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index(){
        return view('accreditation.staff.login');
    }

    public function staffLogin(StaffLoginPostRequest $postRequest){
        $validated = $postRequest->validated();
        try {
            DB::beginTransaction();
            $staff = \App\Models\Staff::where([
                ['username', $validated['username']],
                ['password', $validated['password']],
            ])->first();
            if (is_null($staff)) {
                $mbbits_message =
                    [
                        [
                            'key' => 'Invalid Entry',
                            'value' => 'Invalid Username and/or Password, please check and try again.',
                            'type' => 'danger',
                            'fa-icon' => 'fa fa-warning'
                        ],
                    ];
                session()->flash('mbbits_message', $mbbits_message);
                return back();
            }

                Auth::guard('staff')->login($staff);

            $mbbits_message =
                [
                    [
                        'key' => 'Login Successful',
//                                    'value' => '<ul style="padding-left: 50px"><li>You do not</li><li>have the right priveleges</li>',
                        'value' => $staff->title." ".$staff->name . " (" . $staff->staff_number . "), you have successfully logged in",
                        'type' => 'success',
                        'fa-icon' => 'fa fa-check'
                    ],
//                                [
//                                    'key' => 'Valid Route',
//                                    'value' => 'You do not have the right priveleges',
//                                    'type' => 'success',
//                                    'fa-icon'=>'fa-user-plus'
//                                ]
            ];

            session()->flash('mbbits_message', $mbbits_message);

            return redirect()->action([\App\Http\Controllers\Staff\DashboardController::class, 'index']);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            dd($e);
//            $mbbits_message =
//                [
//                    [
//                        'key' => 'Error',
//                        'value' => 'An error has occurred please try again later.',
//                        'type' => 'danger',
//                        'fa-icon' => 'fa fa-warning'
//                    ],
//                ];
//            session()->flash('mbbits_message', $mbbits_message);
            return back();
        }

    }
}
