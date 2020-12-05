@extends('backend.master')

@section('content')
   <div class="container-fluid">
       <div class="row">
           <div class="col-lg-12">
               <div class="card mt 3">
                    <div class="card-header bg-info text-white">
                        <b>My Profile</b>
                    </div>
                    <div class="card-body">
                        <form action="{{url('update/doctor/info')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label for="">Full Name:</label>
                                                <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Contact :</label>
                                                <input type="text" name="contact" value="@if($doctors_info != null) {{$doctors_info->contact}} @endif" placeholder="01*********" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Department :</label>
                                            <select name="department_id"  class="form-control" id="">
                                                <option value="@if($doctors_info != null) {{$doctors_info->department_id}} @endif">Select One</option>
                                                @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{$department->department}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>NID Number :</label>
                                                <input type="text" value="@if($doctors_info != null) {{$doctors_info->nid}} @endif"  name="nid" class="form-control" placeholder="National ID Number" required>
                                            </div>
                                        </div>                                      
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Degree :</label>
                                                <textarea name="degree" value="" class="form-control" placeholder="Professional Degree" required>@if($doctors_info != null) {{$doctors_info->degree}} @endif</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <br>
                                                <b>Update Working Day :</b>
                                                <br><br>
                                                <input type="checkbox" name="sat" id="sat"> <label for="sat">Saturday</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="sun" id="sun"> <label for="sun">Sunday</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="mon" id="mon"> <label for="mon">Monday</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="tue" id="tue"> <label for="tue">Tuesday</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="wed" id="wed"> <label for="wed">Wednesday</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="thu" id="thu"> <label for="thu">ThurseDay</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="fri" id="fri"> <label for="fri">Friday</label>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <br>
                                                <b>Update Working Hour :</b>
                                                <br><br>
                                                <input type="checkbox" name="time1" id="time1"> <label for="time1">9-10 am</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="time2" id="time2"> <label for="time2">10-11 am</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="time3" id="time3"> <label for="time3">11-12 am</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="time4" id="time4"> <label for="time4">12-1 pm</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="time5" id="time5"> <label for="time5">1-2 pm</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="time6" id="time6"> <label for="time6">2-3 pm</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="time7" id="time7"> <label for="time7">3-4 pm</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="time8" id="time8"> <label for="time8">4-5 pm</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="time9" id="time9"> <label for="time9">5-6 pm</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="time10" id="time10"> <label for="time10">6-7 pm</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="time11" id="time11"> <label for="time11">7-8 pm</label> &nbsp;&nbsp;
                                                <input type="checkbox" name="time12" id="time12"> <label for="time12">8-9 pm</label> &nbsp;&nbsp;
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-12 text-center pt-4">
                                            <input type="submit" value="Update Information" class="btn btn-success rounded">
                                        </div>
                                    </div>

                                  
                                    
                                    
                                </div>

                                <div class="col-lg-4">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>
                                                    @if($doctors_info != null)
                                                        @if($doctors_info->image!=null)
                                                   
                                                            <img src="{{url($doctors_info->image)}}" class="img-fluid">
                                                        @endif
                                                    @endif
                                                    <br>
                                                    <label>Upload Your Image :</label>
                                                    <input type="file" name="image" id="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                    <img id="blah" class="img-fluid">
                                                </label>
                                            </div>
                                            <h5 class="mt-4">My Current Working Day :</h5>
                                            @if($doctors_info != null)
                                                    @if($doctors_info->sat!=null)
                                                    Sat-
                                                    @endif
                                                    @if($doctors_info->sun!=null)
                                                    sun -
                                                    @endif

                                                    @if($doctors_info->mon!=null)
                                                    mon -
                                                    @endif

                                                    @if($doctors_info->tue!=null)
                                                    Tue -
                                                    @endif

                                                    @if($doctors_info->wed!=null)
                                                    Wed -
                                                    @endif

                                                    @if($doctors_info->thu!=null)
                                                    Thu -
                                                    @endif

                                                    @if($doctors_info->fri!=null)
                                                    Fri -
                                                    @endif
                                            @endif


                                            <h5 class="mt-4">My Current Working Hour :</h5>
                                            @if(DB::table('appoinment_times')->where('doctor_id',Auth::user()->id)->exists())
                                                @if($times != null)
                                                    @foreach ($times as $time)
                                                        {{$time->time}},
                                                    @endforeach
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                    
                                    
                            </div>
                           


                        </form>
                    </div>
               </div>
           </div>
       </div>
   </div>
@endsection
