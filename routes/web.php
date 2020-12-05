<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('frontend.index');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('Add/department','adminController@viewDepartment');
Route::post('add/new/department','adminController@addDepartment');
Route::get('doctor/list/for/admin','adminController@viewDoctorsList');
Route::get('delete/doctor/{id}','adminController@deleteDoctorsList');
Route::get('patient/list','adminController@viewPatientList');
Route::get('delete/patient/{id}','adminController@deletePatient');
Route::get('admin/register/page','adminController@adminRegister');
Route::post('add/new/admin','adminController@addNewAdmin');
Route::get('delete/admin/{id}','adminController@deleteAdimn');
Route::get('doctor/list/pdf','adminController@doctorlistPdf');
Route::get('patient/list/pdf','adminController@patientlistPdf');
Route::get('appoinment/list/pdf','adminController@appoinmentlistPdf');
Route::get('about/page','adminController@aboutPage');
Route::post('insert/about/page','adminController@inseartaboutPage');






Route::get('my/doctor/profile','DoctorController@myProfilePage');
Route::post('update/doctor/info','DoctorController@updateDoctorpage');
Route::get('pending/list/appoinment/for/doctor','DoctorController@pendingAppoinment');
Route::get('/approve/pending/appoinments/by/doctor/{id}','DoctorController@approvePendingAppoinment');
Route::get('recent/approved/appoinment/for/doctor','DoctorController@recentAppoinment');
Route::get('cancel/pending/appoinments/by/doctor/{id}','DoctorController@cancelAppoinment');
Route::get('delete/recent/approved/by/doctor/{id}','DoctorController@cancelrecentAppoinment');
Route::get('previous/approved/appoinment/by/doctor','DoctorController@previousAppoinment');
Route::get('delete/previous/appoinments/by/doctor/{id}','DoctorController@deletepreviousAppoinment');
Route::get('cancelled/appoinment/by/doctor','DoctorController@viewcancelAppoinment');
Route::get('delete/cancelled/appoinments/by/doctor/{id}','DoctorController@deletecancelAppoinment');




Route::get('my/user/profile','patientController@myProfilePage');
Route::post('update/patient/info','patientController@updatepatientpage');
Route::get('/recent/approved/appoinment','PatientController@getRecentApprovedList');
Route::get('delete/recent/approved/{id}','PatientController@deleteRecentApprovedList');
Route::get('pending/list/appoinment','PatientController@pendingList');
Route::get('delete/pending/appoinments/{id}','PatientController@deletependingList');
Route::get('previous/approved/appoinment','PatientController@previousAppoinment');
Route::get('delete/previous/appoinments/{id}','PatientController@deletepreviousAppoinment');
Route::get('cancelled/appoinment','PatientController@cancelAppoinment');
Route::get('delete/cancel/appoinments/{id}','PatientController@deletecancelAppoinment');

//Appoinment

Route::get('take/doctor/appoinment','appoinmentController@viewAppoinmentPage');
Route::get('/findDoctorWithDepartment/{id}','appoinmentController@findDoctorWithDepartment');
Route::get('/findDateWithDoctor/{id}','appoinmentController@findDateWithDoctor');
Route::get('/findTimeWithDoctor/{id}','appoinmentController@findTimeWithDoctor');
Route::post('book/appoinment','appoinmentController@bookAppoinment');


//fromtendController

Route::get('department/list','frontendController@departmentlist');
Route::get('/doctor/by/deparmtent/{id}','frontendController@doctorByDepartment');
Route::get('doctor/list','frontendController@Doctorlist');
Route::get('about/view/page','frontendController@aboutview');


