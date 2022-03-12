<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Trades;
use Illuminate\Support\Facades\Auth;
use DB;

class Trade extends Controller
{
    // Add Trade Method
    public function AddTrade(){
        
        $ActiveTrade = [
            'is_deleted' => '0'
        ];
        $allTrade = Trades::where($ActiveTrade)->paginate(10);
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
            'trade' => $allTrade,
            'message' => $message
        ];
        if(!Auth::user()->is_teacher == '1'){
            return redirect('Dashboard/UpdateStudent/'.Auth::user()->id)->with('danger', 'Sorry You Dont have permission');
        }
        return view('Dashboard.add-trade',$data);
        //Auth::user()->id;
        //Auth::user()->is_student;
    }

    // Updata Trade Method
    public function UpdateTrade( $id ){
        $ActiveTrade = [
            'is_deleted' => '0'
        ];
        $allTrade = Trades::where($ActiveTrade)->get();
        $byId = Trades::where(['id' => $id])->get();
        $tradeId = $id;
        $data = [
            'trade' => $allTrade,
            'tradeUpdate' => $byId,
            'tradeId' => $tradeId
        ];
        if(!Auth::user()->is_teacher == '1'){
            return redirect('Dashboard/UpdateStudent/'.Auth::user()->id)->with('danger', 'Sorry You Dont have permission');
        }
        return view('Dashboard.update-trade',$data);
    }

    // StudentByTrade Trade Method
    public function StudentByTrade( $id ){
        $ActiveTrade = [
            'is_deleted' => '0'
        ];
        $studentByTrade = [
            'is_deleted' => '0',
            'trade_id' => $id,
            'is_student' => '1'
        ];
        $allTrade = Trades::where($ActiveTrade)->get();
        $AllStudentByTrade = User::where($studentByTrade)->paginate(10);
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
            'trade' => $allTrade,
            'user' => $AllStudentByTrade,
            'message' => $message
        ];
        if(!Auth::user()->is_teacher == '1'){
            return redirect('Dashboard/UpdateStudent/'.Auth::user()->id)->with('danger', 'Sorry You Dont have permission');
        }
        return view('Dashboard.all-by-trade',$data);
    }

    // DeletedStudentByTrade Trade Method
    public function DeletedStudentByTrade( $id ){
        $ActiveTrade = [
            'is_deleted' => '0'
        ];
        $studentByTrade = [
            'is_deleted' => '1',
            'trade_id' => $id,
            'is_student' => '1'
        ];
        $allTrade = Trades::where($ActiveTrade)->get();
        $AllStudentByTrade = User::where($studentByTrade)->paginate(10);
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
            'trade' => $allTrade,
            'user' => $AllStudentByTrade,
            'message' => $message
        ];
        if(!Auth::user()->is_teacher == '1'){
            return redirect('Dashboard/UpdateStudent/'.Auth::user()->id)->with('danger', 'Sorry You Dont have permission');
        }
        return view('Dashboard.deleted-by-trade',$data);
    }

    // All Deleted Trade Method
    public function DeletedTrade(){
        $ActiveTrade = [
            'is_deleted' => '1'
        ];
        $allTrade = Trades::where($ActiveTrade)->paginate(2);
        $countTrade = $allTrade->count();
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
            'trade' => $allTrade,
            'count' => $countTrade,
            'message' => $message
        ];
        if(!Auth::user()->is_teacher == '1'){
            return redirect('Dashboard/UpdateStudent/'.Auth::user()->id)->with('danger', 'Sorry You Dont have permission');
        }
        return view('Dashboard.all-deleted-trade',$data);
    }



    // Add Trade Actions and Update Trade Action
    // Add Trade Action Method
    public function AddTradeAction(Request $data ){

        $added_by = Auth::user()->id;
        if(Auth::user()->is_super == '1'){
            DB::beginTransaction();
            try {
                $trade = new Trades();
                $trade->trade_name = $data->name;
                $trade->trade_status = $data->status;
                $trade->added_by = $added_by;
                if (!$trade->save()) {
                    throw new Exception("Query problem on creating record.");
                }
                DB::commit();
                return redirect()->back()->with('success', 'New record created successfully.');
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back()->with('danger', 'Data Not added.');
            }
        }else{
            return redirect()->back()->with('danger', 'Sorry You Dont Have any Permission To add new Trade. Only teacher can add Trade.');
        }
    }
    // Update Trade Action
    public function UpdateTradeAction(Request $data , $id ){
        $updated_by = Auth::user()->id;
        if(Auth::user()->is_super == '1'){
            DB::beginTransaction();
            try {
                $trade = Trades::find($id);
                $trade->trade_name = $data->name;
                $trade->trade_status = $data->status;
                $trade->updated_by = $updated_by;
                if (!$trade->save()) {
                    throw new Exception("Query problem on creating record.");
                }
                DB::commit();
                return redirect()->back()->with('success', 'New record created successfully.');
            } catch (Exception $e) {
                DB::rollback();
                return redirect()->back()->with('danger', 'Data Not added.');
            }
        }else{
            return redirect()->back()->with('danger', 'Sorry You Dont Have any Permission To add new Trade. Only teacher can add Trade.');
        }
    }
    // Delete Trade Action
    public function DeleteTradeAction( $id ){
        $deleted_by = Auth::user()->id;
        $super_user = Auth::user()->is_super;
        $is_deleted = '1';
        if($super_user == '1'){
            DB::beginTransaction();
            try {
                $user = Trades::find($id);
                $user->deleted_by = $deleted_by;
                $user->is_deleted = $is_deleted;
                if (!$user->save()) {
                    throw new Exception("Query problem on creating record.");
                }
                DB::commit();
                return redirect('Dashboard')->with('success', 'Record Deleted Successfully.');
            } catch (Exception $e) {
                DB::rollback();
                return redirect('Dashboard')->with('danger', 'Query Problem');
            }
        }else{
            return redirect('Dashboard')->with('danger', 'Sorry You Dont have permission to Deleted Trades.');
        }
    }

    // Trade restore back
    public function restoreTrade( $id ){
        $deleted_by = Auth::user()->id;
        $super_user = Auth::user()->is_super;
        $is_deleted = '0';
        if($super_user == '1'){
            DB::beginTransaction();
            try {
                $user = Trades::find($id);
                $user->deleted_by = $deleted_by;
                $user->is_deleted = $is_deleted;
                if (!$user->save()) {
                    throw new Exception("Query problem on creating record.");
                }
                DB::commit();
                return redirect('Dashboard')->with('success', 'Record Deleted Successfully.');
            } catch (Exception $e) {
                DB::rollback();
               
                return redirect('Dashboard')->with('danger', 'Query Problem');
            }
        }else{
           
            return redirect('Dashboard')->with('danger', 'Sorry You Dont have permission to Deleted Trades.');
        }
    }
}
