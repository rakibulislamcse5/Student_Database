<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    //teacher registar
    public function TeacherRegister()
    {
        //return view('auth.teacher-register');
        return 'Page not found!!!';
    }
    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        $is_student = "1";
        $is_teacher = '0';
        $is_super = '0';
        $teacher_role = 'Student';

        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone_number = $request->phone;
            $user->roll_no = $request->roll;
            $user->registration_no = $request->registration;
            $user->session = $request->session;
            $user->sift_group = $request->shift;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->is_student = $is_student;
            $user->is_teacher = $is_teacher;
            $user->is_super = $is_super;
            $user->teacher_role = $teacher_role;
            $user->password = Hash::make($request->password);
            if (!$user->save()) {
                throw new Exception("Query problem on creating record.");
            }
            DB::commit();
            return redirect('/login')->with('success', 'New record created successfully.');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('danger', $e->getMessage());
        }

        // event(new Registered($user));

        // Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }


    // This function store Teacher
    public function storeTeacher(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        
        $is_student = "0";
        $is_teacher = '1';
        $is_super = '0';
        $teacher_role = 'Teacher';


        // DB::beginTransaction();
        // try {
        //     $user = new User();
        //     $user->name = $request->name;
        //     $user->email = $request->email;
        //     $user->phone_number = $request->phone;
        //     $user->roll_no = $request->roll;
        //     $user->registration_no = $request->registration;
        //     $user->session = $request->session;
        //     $user->sift_group = $request->shift;
        //     $user->address = $request->address;
        //     $user->gender = $request->gender;
        //     $user->is_student = $is_student;
        //     $user->is_teacher = $is_teacher;
        //     $user->is_super = $is_super;
        //     $user->teacher_role = $teacher_role;
        //     $user->password = Hash::make($request->password);
        //     if (!$user->save()) {
        //         throw new Exception("Query problem on creating record.");
        //     }
        //     DB::commit();
        //     return redirect('/login')->with('success', 'New record created successfully.');
        // } catch (Exception $e) {
        //     DB::rollback();
        //     return redirect()->back()->with('danger', $e->getMessage());
        // }

        // event(new Registered($user));

        // Auth::login($user);

        //return redirect(RouteServiceProvider::HOME);
        return 'Page not found!!!';
    }
}
