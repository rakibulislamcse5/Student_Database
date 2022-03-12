<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trades;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use DB;

class Teacher extends Controller
{
    // Home Method
    public function home(){
        $ActiveTrade = [
            'is_deleted' => '0'
        ];
        $allTrade = Trades::where($ActiveTrade)->get();

        $ActiveTeacher = [
            'is_deleted' => '0',
            'is_teacher' => '1',
            'is_student' => '0'
        ];
        $AllTeacher = User::where($ActiveTeacher)->paginate(10);

        $blank = User::where(['id' => Auth::user()->id])->get();
        $BlankImage = $blank[0]['image'];
        $BlankTrade = $blank[0]['trade_id'];
        $authId = Auth::user()->id;
        $message = '';
        if (empty($BlankImage)) {
            $message = "Upload Your Profile Picture.";
        }elseif(empty($BlankTrade)){
            $message = "Update Your Trade";
        }
        $data = [
            'user' => $AllTeacher,
            'trade' => $allTrade,
            'message' => $message
        ];
        if(!Auth::user()->is_super == '1'){
            return redirect('/Dashboard')->with('danger', 'Sorry You Dont have permission');
        }
        return view('Dashboard.all-teacher',$data);
    }
    // Add Teacher Method
    public function AddTeacher(){
        $ActiveTrade = [
            'is_deleted' => '0'
        ];
        $allTrade = Trades::where($ActiveTrade)->get();

        $ActiveTeacher = [
            'is_deleted' => '0',
            'is_teacher' => '1',
            'is_student' => '0'
        ];
        $AllTeacher = User::where($ActiveTeacher)->get();
        $data = [
            'user' => $AllTeacher,
            'trade' => $allTrade
        ];
        if( Auth::user()->is_super == '1'){
            return view('Dashboard.add-teacher',$data);
        }else{
            return redirect('Dashboard')->with('danger', 'Sorry You Dont have permission to Add New Teacher');
        }
        
    }

    // Updata Teacher Method
    public function UpdateTeacher( $id ){
        $ActiveTrade = [
            'is_deleted' => '0'
        ];
        $updateStudent = [
            'id' => $id
        ];
        $allTrade = Trades::where($ActiveTrade)->get();
        $updateSql = User::where($updateStudent)->get();
        $UpdateStudent = $updateSql[0];
        $data = [
            'trade' => $allTrade,
            'update' => $UpdateStudent
        ];
        if(!Auth::user()->is_super == '1'){
            return redirect('/Dashboard')->with('danger', 'Sorry You Dont have permission');
        }
        return redirect()->back()->with('danger', 'Sorry You Dont have permission to update Teacher');
        
    }

    // All Deleted Teacher Method
    public function DeletedTeacher(){
        $ActiveTrade = [
            'is_deleted' => '0'
        ];
        $allTrade = Trades::where($ActiveTrade)->get();
        $ActiveTeacher = [
            'is_deleted' => '1',
            'is_teacher' => '1'
        ];

        $AllTeacher = User::where($ActiveTeacher)->paginate(10);
        $blank = User::where(['id' => Auth::user()->id])->get();
        $BlankImage = $blank[0]['image'];
        $BlankTrade = $blank[0]['trade_id'];
        $authId = Auth::user()->id;
        $message = '';
        if (empty($BlankImage)) {
            $message = "Upload Your Profile Picture.";
        }elseif(empty($BlankTrade)){
            $message = "Update Your Trade";
        }
        $data = [
            'user' => $AllTeacher,
            'trade' => $allTrade,
            'message' => $message
        ];
        if(!Auth::user()->is_super == '1'){
            return redirect('/Dashboard')->with('danger', 'Sorry You Dont have permission');
        }
        return view('Dashboard.all-deleted-teacher',$data);
    }

    // Add Actions and Update Teacher Action
    // Add Teacher Action Method
    public function AddTeacherAction(Request $data ){
        $is_student = "0";
        $is_teacher = '1';
        $is_super = '0';
        $teacher_role = 'Teacher';
        $added_by = Auth::user()->id;
        $data->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);

        if($data->password !== $data->confirm_pass){
            return redirect()->back()->with('danger', 'Password Not Matched');
        }

        if(!Auth::user()->is_super == '1'){
            return redirect('/Dashboard')->with('danger', 'Sorry You Dont have permission');
        }

        DB::beginTransaction();
        try {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->phone_number = $data->phone;
            $user->roll_no = $data->roll;
            $user->registration_no = $data->registration;
            $user->session = $data->session;
            $user->sift_group = $data->shift;
            $user->address = $data->address;
            $user->trade_id = $data->trade;
            $user->gender = $data->gender;
            $user->is_student = $is_student;
            $user->is_teacher = $is_teacher;
            $user->is_super = $is_super;
            $user->added_by = $added_by;
            $user->teacher_role = $teacher_role;
            $user->password = Hash::make($data->password);
            if (!$user->save()) {
                throw new Exception("Query problem on creating record");
            }
            DB::commit();
            return redirect()->back()->with('success', 'New Record Created Successfully');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('danger', $e->getMessage());
        }
    }
    // Update Teacher Action
    public function UpdateTeacherAction(Request $data , $id){
        $teacher_role = 'Teacher';
        $updated_by = Auth::user()->id;
        $super_user = Auth::user()->is_teacher;
        $File = $data->file('photo');
        // image old link
        if(!$File == ''){
            $file = $data->photo->getClientOriginalName();
            $fileExplode = explode(".",$file);
            $imageEnd = strtolower(end($fileExplode));
            $imageName = substr(md5(time()),0,50).".".$imageEnd;
            $imageLink = '/images/student/'.$imageName;
            $fileSize = $File->getSize()/1024;
            $imageVal = '1';
            $userImageUnlink = User::where(['id' => $id])->get();
            File::delete($userImageUnlink[0]['image']);

        }else{
            //return redirect()->back()->with('danger', 'Please Upload Image');
            $userImageUnlink = User::where(['id' => $id])->get();
            if(!$userImageUnlink[0]['image'] == '' or !$userImageUnlink[0]['image'] == null){
                $imageLink = $userImageUnlink[0]['image'];
            }else{
                $imageLink = '/images/student/no_image.png';
            }
            $file = '/images/student/no_image';
            $fileSize = '3000';
            $imageEnd   = 'png';
            $fileSize = "1";
            $imageVal = '';

        }

        if($super_user == '1' or Auth::user()->id == $id){
            //dd($data->photo);
            
            
            if($fileSize > 3072){
                return redirect()->back()->with('danger', 'Please Upload Image Less then 3 MB');
            }elseif(!$imageEnd == 'jpg' or !$imageEnd == 'png'){
                return redirect()->back()->with('danger', 'Your File Extension is '.$imageEnd.'.Please upload jpg or png Image For Profile Picture');
            }
            $userImageUnlink = User::where(['id' => $id])->get();

            if(!$imageVal == ''){
                $File->move('images/student',$imageName);
            }else{

            }
            
            DB::beginTransaction();
            try {
                $user = User::find($id);
                if(Auth::user()->id == $id or $super_user == '0'){
                    $user->name = $data->name;
                    $user->email = $data->email;
                    $user->phone_number = $data->phone;
                    $user->address = $data->address;
                    $user->gender = $data->gender;
                    $user->image = $imageLink;
                    $user->trade_id = $data->trade;
                    $user->roll_no = $data->roll;
                    $user->registration_no = $data->registration;
                    $user->session = $data->session;
                    $user->sift_group = $data->shift;
                }else{
                    $user->name = $data->name;
                    $user->email = $data->email;
                    $user->phone_number = $data->phone;
                    $user->roll_no = $data->roll;
                    $user->registration_no = $data->registration;
                    $user->session = $data->session;
                    $user->sift_group = $data->shift;
                    $user->address = $data->address;
                    $user->trade_id = $data->trade;
                    $user->gender = $data->gender;
                    $user->updated_by = $updated_by;
                    $user->teacher_role = $teacher_role;
                    $user->image = $imageLink;
                }
                if (!$user->save()) {
                    throw new Exception("Query problem on creating record");
                }
                DB::commit();
                return redirect()->back()->with('success', 'Record Updated Successfully');
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back()->with('danger', 'Query Problem');
            }
        }else{
            return redirect()->back()->with('danger', 'Sorry You Dont have permission to added New Student');
        }

        
    }
    // Delete Teacher
    public function DeleteTeacherAction( $id ){
        $deleted_by = Auth::user()->id;
        $super_user = Auth::user()->is_super;
        if($super_user == '1'){
            DB::beginTransaction();
            try {
                $user = User::find($id);
                $user->deleted_by = $deleted_by;
                $user->is_deleted = '1';
                if (!$user->save()) {
                    throw new Exception("Query problem on creating record");
                }
                DB::commit();
                return redirect()->back()->with('success', 'Record Deleted Successfully');
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back()->with('danger', 'Query Problem');
            }
        }else{
            return redirect()->back()->with('danger', 'Sorry You Dont have permission to Deleted Teacher');
        }
    }

    // Password Change
    public function ChangePass(Request $data , $id ){
        $updated_by = Auth::user()->id;
        if(Auth::user()->is_super == '1' or Auth::user()->id == $id){
            if($data->password !== $data->confirm_password){
                return redirect()->back()->with('error', 'Confirm Password not metched!!');
            }
            DB::beginTransaction();
            try {
                $trade = User::find($id);
                $trade->password = Hash::make($data->password);
                $trade->updated_by = $updated_by;
                if (!$trade->save()) {
                    throw new Exception("Query problem on creating record");
                }
                DB::commit();
                return redirect()->back()->with('success', 'Record Update successfully');
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back()->with('danger', 'Data Not added');
            }
        }else{
            return redirect()->back()->with('danger', 'Sorry You Dont Have any Permission To Change Password');
        }
    }

    // Teacher restore back
    public function restoreBack( $id ){
        //$deleted_by = Auth::user()->id;
        $super_user = Auth::user()->is_super;
        if($super_user == '1'){
            DB::beginTransaction();
            try {
                $user = User::find($id);
                $user->is_deleted = '0';
                if (!$user->save()) {
                    throw new Exception("Query problem on creating record.");
                }
                DB::commit();
                return redirect()->back()->with('success', 'Record Update Successfully.');
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back()->with('danger', 'Query Problem');
            }
        }else{
            return redirect()->back()->with('danger', 'Sorry You Dont have permission to Restore');
        }
    }
}
