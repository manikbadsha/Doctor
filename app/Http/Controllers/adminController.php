<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\patient;
use Illuminate\Support\Str;
use App\User;
use PDF;
use App\about;
use App\doctor;
use Brian2694\Toastr\Facades\Toastr;

class adminController extends Controller
{
    public function viewDepartment(){
        $categories=department::orderBy('id','desc')->paginate(10);
        return view('backend.department',compact('categories'));
    }

    public function addDepartment(Request $request){
        $validatedData = $request->validate([
            'department' => 'required||min:3',
            
        ]);

        if(department::where('department',$request->department)->exists()){
          
            Toastr::warning('This Department Already exists', 'Already exists');
                return back();
        }
        else{
            department::insert ([
                'department' => $request->department,
                'icon' => $request->icon,
                'created_at' => Carbon::now()
            ]);
                  
            Toastr::success('Department Inserted', 'Successfull');
                    return back();
    
        }
    }
    public function viewDoctorsList(){
        $infos = doctor::paginate(20);
        return view('backend.doctor_list',compact('infos'));
    }

    public function deleteDoctorsList($id){
        doctor::where('id',$id)->delete();
        Toastr::error('Doctor Deleted Successfully', 'Deleted');
        return back();
    }

    public function viewPatientList(){
        $infos=patient::paginate(20);
        return view('backend.patient_list',compact('infos'));
    }

    public function deletePatient($id){
        patient::where('id',$id)->delete();
        Toastr::error('Doctor Deleted Successfully', 'Deleted');
        return back();
    }

    public function adminRegister(){
        $infos = User::where('user_type','admin')->get();
        return view('backend.admin_list',compact('infos'));
    }

    public function addNewAdmin(Request $request){
        if(User::where('email',$request->email)->exists()){
            Toastr::warning('This Email Already exists', 'Already exists');
            return back();
        }
        else{
            User::insert([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
                'user_type'=> "admin",
                'created_at' => Carbon::now()
            ]);
            Toastr::success('New Admin registered Successfully', 'Successfull');
            return back();
        }
    }

    public function deleteAdimn($id){
        User::where('id',$id)->delete();
        Toastr::error('Admin Deleted Successfully', 'Deleted');
        return back();
    }
    public function doctorlistPdf(){
        $datas = doctor::all();
        $pdf = PDF::loadView('backend.doctor_list_pdf', compact('datas'));
        return $pdf->stream('doctors.pdf');
    }
    public function patientlistPdf(){
        $datas = patient::all();
        $pdf = PDF::loadView('backend.patient_list_pdf', compact('datas'));
        return $pdf->stream('patients.pdf');
    }

    public function appoinmentlistPdf(){
        $datas = DB::table('appoinments')
        ->join('doctors','appoinments.doctor_id','=','doctors.user_id')
        ->select('appoinments.*','doctors.name as doctor_name')
        ->get();

        $pdf = PDF::loadView('backend.appointment_list_pdf', compact('datas'));
        return $pdf->stream('appointment.pdf');
    }

    public function aboutPage(){
        return view('backend.aboutus');
    }

    public function inseartaboutPage(Request $request){
        if($image = $request->file('image')){
            $destinationPath = public_path().'/patient_image/';
            $profileImage = str::random(5) . "-" . time() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            about::insert([
            
                'image'=>'patient_image/'.$profileImage,
                'text'=>$request->about,

                'created_at'  => Carbon::now(),
            ]);

            Toastr::success('about inseart successfully', 'Success');
            return back();


        }
        else{
            about::insert([
            
       
                'text'=>$request->about,

                'created_at'  => Carbon::now(),
            ]);

            Toastr::success('about inseart successfully', 'Success');
            return back();
        }
    }

}
