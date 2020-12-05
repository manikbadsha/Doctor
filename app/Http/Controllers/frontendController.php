<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\about;

class frontendController extends Controller
{
    public function departmentlist(){
        return view('frontend.department');
    }

    public function doctorByDepartment($id){
        $departments=DB::table('doctors')
									->join('departments','doctors.department_id','=','departments.id')
									->join('users','doctors.user_id','=','users.id')
                                    ->select('doctors.*','departments.department','users.email')
                                    ->where('doctors.department_id',$id)
									->get();
        $doctors = DB::table('doctors')
                        ->join('departments','doctors.department_id','=','departments.id')
                        ->select('doctors.*','departments.department as department_name')
                        ->where('doctors.department_id',$id)
                        ->get();

        return view('frontend.doctors',compact('departments','doctors'));
    }

    public function Doctorlist(){
        $departments=DB::table('doctors')
									->join('departments','doctors.department_id','=','departments.id')
									->join('users','doctors.user_id','=','users.id')
                                    ->select('doctors.*','departments.department','users.email')
									->get();
        $doctors = DB::table('doctors')
                ->join('departments','doctors.department_id','=','departments.id')
                ->select('doctors.*','departments.department as department_name')
                ->get();

                return view('frontend.doctors',compact('departments','doctors'));
    }

    public function aboutview(){

        $abouts=about::where('id',1)->first();
        return view('frontend.about',compact('abouts'));
    }
}
