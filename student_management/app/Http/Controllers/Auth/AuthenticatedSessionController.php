<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $checkAdmin = User::where(['is_super' => '1','is_teacher' => '1'])->get();
        $countAdmin = User::where(['is_super' => '1','is_teacher' => '1'])->get()->count();
        if($countAdmin > 0){
        }else{
            //add Admin 
            $name = 'Admin Panel Account';
            $email = 'admin@gmail.com';
            $phone = '01700000000';
            $roll   = 'No Roll Found';
            $registration = 'No Register Found';
            $session = 'No session found';
            $shift = '0';
            $address = 'No address Found';
            $trade = '';
            $gender = '';
            $is_student = '0';
            $is_teacher = '1';
            $is_super = '1';
            $teacher_role = 'Super Admin';
            $userPass = 'admin';
            //-----------------------------
            //Admin query
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->phone_number = $phone;
            $user->roll_no = $roll;
            $user->registration_no = $registration;
            $user->session = $session;
            $user->sift_group = $shift;
            $user->address = $address;
            $user->trade_id = $trade;
            $user->gender = $gender;
            $user->is_student = $is_student;
            $user->is_teacher = $is_teacher;
            $user->is_super = $is_super;
            $user->teacher_role = $teacher_role;
            $user->password = Hash::make($userPass);
            if (!$user->save()) {
                //echo "successfully added Admin";
            }
        }
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
