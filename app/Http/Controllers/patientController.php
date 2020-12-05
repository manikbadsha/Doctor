<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\patient;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\appoinment;
use Brian2694\Toastr\Facades\Toastr;

use Illuminate\Support\Facades\Auth;


class patientController extends Controller
{
    public function myProfilePage(){
        if(patient::where('user_id',Auth::user()->id)->exists()){
            $patient_info = patient::where('user_id',Auth::user()->id)->first();
            return view('backend.patient.my_profile',compact('patient_info'));
        }
        else{
            $patient_info = null;
            return view('backend.patient.my_profile',compact('patient_info'));
        }
    }

    public function updatepatientpage(Request $request){
        if(patient::where('user_id',Auth::user()->id)->exists()){
            if($image = $request->file('image')){
                $destinationPath = public_path().'/patient_image/';
                $profileImage = str::random(5) . "-" . time() . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);

                patient::where('user_id',Auth::user()->id)->update([
                    'name'        => $request->name,
                    'email'       => $request->email,
                    'user_id'     => Auth::user()->id,
                    'contact'     => $request->contact,
                    'nid'         => $request->nid,
                    'address'     => $request->address,
                    'image'       => 'patient_image/'.$profileImage,
                    'updated_at'  => Carbon::now(),
                ]);

                Toastr::success('Patient Profile Updated Successfully', 'Success');
                return back();




            }else{

                patient::where('user_id',Auth::user()->id)->update([
                    'name'        => $request->name,
                    'email'       => $request->email,
                    'user_id'     => Auth::user()->id,
                    'contact'     => $request->contact,
                    'nid'         => $request->nid,
                    'address'     => $request->address,
                    'updated_at'  => Carbon::now(),
                ]);

                Toastr::success('Patient Profile Updated Successfully', 'Success');
                return back();

            }




        }else{
            if($image = $request->file('image')){
                $destinationPath = public_path().'/patient_image/';
                $profileImage = str::random(5) . "-" . time() . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);

                patient::where('user_id',Auth::user()->id)->insert([
                    'name'        => $request->name,
                    'email'       => $request->email,
                    'user_id'     => Auth::user()->id,
                    'contact'     => $request->contact,
                    'nid'         => $request->nid,
                    'address'     => $request->address,
                    'image'       => 'patient_image/'.$profileImage,
                    'created_at'  => Carbon::now(),
                ]);

                Toastr::success('Patient Profile Updated Successfully', 'Success');
                return back();




            }else{

                patient::where('user_id',Auth::user()->id)->insert([
                    'name'        => $request->name,
                    'email'       => $request->email,
                    'user_id'     => Auth::user()->id,
                    'contact'     => $request->contact,
                    'nid'         => $request->nid,
                    'address'     => $request->address,
                    'created_at'  => Carbon::now(),
                ]);

                Toastr::success('Patient Profile Updated Successfully', 'Success');
                return back();

            }

        }
    }

    public function getRecentApprovedList(){
        $date = date('Y-m-d H:i:s');
        $current_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
        $details =DB::table('appoinments')
                ->join('patients','appoinments.patient_id','=','patients.user_id')
                ->select('appoinments.*','patients.*')
                ->where('patient_id',Auth::user()->id)->where('status',1)->where('appoinment_date','>=',$current_date)
                ->orderBy('appoinment_date','asc')
                ->paginate(15);
                return view('backend.patient.recent_approved',compact('details'));
    }

    public function deleteRecentApprovedList($id){
        appoinment::where('slug',$id)->delete();
        Toastr::error('Appoinment has been deleted', 'Deleted Successfully');
        return back();
    }

    public function pendingList(){
        $date = date('Y-m-d H:i:s');
        $current_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
        $details =DB::table('appoinments')
                ->join('patients','appoinments.patient_id','=','patients.user_id')
                ->select('appoinments.*','patients.*')
                ->where('patient_id',Auth::user()->id)->where('status',0)->where('appoinment_date','>=',$current_date)
                ->orderBy('appoinment_date','asc')
                ->paginate(15);
                return view('backend.patient.pending_list',compact('details'));
    }
    public function deletependingList($id){
        appoinment::where('slug',$id)->delete();
        Toastr::error('Appoinment has been deleted', 'Deleted Successfully');
        return back();
    }

    public function previousAppoinment(){
        $date = date('Y-m-d H:i:s');
        $current_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
        $details =DB::table('appoinments')
                ->join('patients','appoinments.patient_id','=','patients.user_id')
                ->select('appoinments.*','patients.*')
                ->where('patient_id',Auth::user()->id)->where('status',1)->where('appoinment_date','<',$current_date)
                ->orderBy('appoinment_date','asc')
                ->paginate(15);
                return view('backend.patient.previous_approve',compact('details'));
    }

    public function deletepreviousAppoinment($id){
        appoinment::where('slug',$id)->delete();
        Toastr::error('Appoinment has been deleted', 'Deleted Successfully');
        return back();
    }

    public function cancelAppoinment(){
        $date = date('Y-m-d H:i:s');
        $current_date = Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('Y-m-d');
        $details =DB::table('appoinments')
                ->join('patients','appoinments.patient_id','=','patients.user_id')
                ->select('appoinments.*','patients.*')
                ->where('patient_id',Auth::user()->id)->where('status',0)->where('appoinment_date','<',$current_date)
                ->orderBy('appoinment_date','asc')
                ->paginate(15);
                return view('backend.patient.cancel_appoinment',compact('details'));
    }
    
    public function deletecancelAppoinment($id){
        appoinment::where('slug',$id)->delete();
        Toastr::error('Appoinment has been deleted', 'Deleted Successfully');
        return back();
    }
}
