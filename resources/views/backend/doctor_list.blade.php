@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-3 rounded">
                    <div class="card-header bg-info text-white rounded">
                        <b><i class="fas fa-user-md"></i>  Doctors List</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">D-ID</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Contact</th>
                                <th scope="col">NID</th>
                                <th scope="col">Degree</th>
                                <th scope="col">Working Day</th>
                                <th scope="col">Working Time</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>

                                @foreach ($infos as $info)
                                <tr>
                                    <th scope="row">{{$info->id}}</th>
                                    <td>
                                        @if($info->image != null)
                                            <img src="{{url($info->image)}}" width="60px">
                                        @endif
                                    </td>
                                    <td>{{$info->name}}</td>
                                    <td>{{$info->contact}}</td>
                                    <td>{{$info->nid}}</td>
                                    <td>{{$info->degree}}</td>
                                    <td>
                                        @if($info->sat != null) Sat, @endif
                                        @if($info->sun != null) Sun, @endif
                                        @if($info->mon != null) Mon, @endif
                                        @if($info->tue != null) Tue, @endif
                                        @if($info->wed != null) Wed, @endif
                                        @if($info->thu != null) Thu, @endif
                                        @if($info->fri != null) Fri @endif
                                    </td>
                                    <td>
                                        <?php
                                            $doctor = DB::table('doctors')->where('id',$info->id)->first();
                                            $working_times = DB::table('appoinment_times')->where('doctor_id',$doctor->user_id)->get();
                                        ?>
                                        @foreach($working_times as $working_time)
                                            {{$working_time->time}},
                                        @endforeach
                                    </td>
                                    <td>
                                        <a href="{{url('delete/doctor')}}/{{$info->id}}" class="btn btn-danger btn-sm rounded"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                          </table>

                          {{ $infos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
