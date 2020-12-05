<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\appoinment;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class appoinmentController extends Controller
{
    public function viewAppoinmentPage(){
        $departments = DB::table('departments')->get();
        return view('frontend.appoinment',compact('departments'));

    }

    
        public function findDoctorWithDepartment($id){
            $districts = DB::table('doctors')->where('department_id',$id)->get();
            return response()->json($districts);
        }
        public function findDateWithDoctor($id){
            $dates = DB::table('appoinment_dates')->where('doctor_id',$id)->get();
            return response()->json($dates);
        }
        public function findTimeWithDoctor($id){
            $times = DB::table('appoinment_times')->where('doctor_id',$id)->get();
            return response()->json($times);
        }

        public function bookAppoinment(Request $request){
        
            if(appoinment::where('doctor_id',$request->doctor_id)->where('appoinment_date',$request->appoinment_date)->where('time_id',$request->time_id)->count() < 4){
    
                if(appoinment::where('appoinment_date',$request->appoinment_date)->where('date_id',$request->date_id)->where('time_id',$request->time_id)->exists()){
                    Toastr::error('Already have an appoinment at that time', 'Chose Another Time');
                    return back();
                }
                else{
                    $slug = time().str::random(15);
                    appoinment::insert([
                        'doctor_id'  => $request->doctor_id,
                        'patient_id' => Auth::user()->id,
                        'date_id'    => $request->date_id,
                        'time_id'    => $request->time_id,
                        'contact'    => $request->contact,
                        'name'       => $request->name,
                        'email'      => $request->email,
                        'created_at' => Carbon::now(),
                        'appoinment_date' => $request->appoinment_date,
                        'slug'       => $slug
                    ]);
                    Toastr::success('Appoinment has been submitted', 'Successfull');
                    return back();
                }
            }
            else{
                Toastr::error('Appoinment Time is not empty', 'Chose Another Time');
                return back();
            }
    
        }
}
