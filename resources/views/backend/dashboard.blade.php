@extends('backend.master')

@section('content')
<section>
    <div class="container-fluid">

      


        @if(Auth::user()->user_type == "doctor")
        <h4 class="mt-4">Your Overview of Appoinments as a <span class="text-success">{{Auth::user()->user_type}} :<span> </h4>
        <div class="row mt-3">
            <div class="col-lg-3 pt-4 pb-4 pl-5 pr-5 rounded text-white" style="background: #52c234;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #061700, #52c234);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #061700, #52c234); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            ">
                <a href="{{url('recent/approved/appoinment/for/doctor')}}" style="color:white;text-decoration:none">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Recent Approved Appoinments<h3>
                    </div>
                    <div class="col-lg-4">
                       
                        <h1></h1>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 pt-4 pb-4 pl-5 pr-5 rounded text-white" style="background: #73C8A9;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #373B44, #73C8A9);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #373B44, #73C8A9); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            ">
                <a href="{{url('pending/list/appoinment/for/doctor')}}" style="color:white;text-decoration:none">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Your Pending Appoinments<h3>
                    </div>
                    <div class="col-lg-4">
                        
                        <h1></h1>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 pt-4 pb-4 pl-5 pr-5 rounded text-white" style="background: #636363;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #a2ab58, #636363);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #a2ab58, #636363); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            ">
                <a href="{{url('previous/approved/appoinment/by/doctor')}}" style="color:white;text-decoration:none">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Previous Approved Appoinments<h3>
                    </div>
                    <div class="col-lg-4">
                       
                        <h1></h1>
                    </div>
                </div>
                </a>
            </div>
            <div class="col-lg-3 pt-4 pb-4 pl-5 pr-5 rounded text-white" style="background: #333333; background: -webkit-linear-gradient(to left, #dd1818, #333333);
            background: linear-gradient(to left, #dd1818, #333333);">
                <a href="{{url('cancelled/appoinment/by/doctor')}}" style="color:white;text-decoration:none">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Your Cancelled Appoinments<h3>
                    </div>
                    <div class="col-lg-4">
                       
                        <h1></h1>
                    </div>
                </div>
                </a>
            </div>
        </div>
        <h4 class="mt-5">Short Details of Your Upcoming Appoinments :</h4>
        <div class="row mt-3">

         

           
            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header bg-info text-white rounded">
                        <h5> Details of Appoinment</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          
                            <div class="col-md-3 text-center">
                             
                                <img src="" height="90" width="90">
                              
                            </div>
                            <div class="col-md-9">
                                <b>Patient Name :</b> <br>
                                <b>Appoinment Date :</b> <br>
                                <b>Appoinment Time :</b> <br>
                                <b>Contact :</b><br>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
           
        </div>
        @endif





    </div>
</section>
@endsection
