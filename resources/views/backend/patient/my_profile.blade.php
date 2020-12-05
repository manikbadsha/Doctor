@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-3">
                    <div class="card-header bg-info text-white">
                        <b>My Profile</b>
                    </div>
                    <div class="card-body">
                        <form action="{{url('update/patient/info')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="form-group">
                                                <label>Full Name :</label>
                                                <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label>Contact :</label>
                                                <input type="text" name="contact" class="form-control" value="@if($patient_info != null) {{$patient_info->contact}} @endif" placeholder="01*********" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Email :</label>
                                                <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>NID Number :</label>
                                                <input type="text" value="@if($patient_info != null) {{$patient_info->nid}} @endif" name="nid" class="form-control" placeholder="National ID Number" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Address :</label>
                                                <textarea name="address" class="form-control" placeholder="Address" required>@if($patient_info != null) {{$patient_info->address}} @endif</textarea>
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
                                                    @if($patient_info != null)
                                                        @if($patient_info->image != null)
                                                            <img src="{{url($patient_info->image)}}" class="img-fluid">
                                                        @endif
                                                    @endif
                                                    <br>
                                                    <label>Upload Your Image :</label>
                                                    <input type="file" name="image" id="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                                    <img id="blah" class="img-fluid">
                                                </label>
                                            </div>
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
