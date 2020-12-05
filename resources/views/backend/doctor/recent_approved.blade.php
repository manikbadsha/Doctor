@extends('backend.master')

@section('content')
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-3">
                        <div class="card-header rounded bg-success text-white">
                            <b><i class="far fa-clock"></i> Recent Approved</b>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">SL</th>
                                        <th scope="col">Appoinment Date</th>
                                        <th scope="col">Time Slot</th>
                                        <th scope="col">Patient Name</th>
                                        <th scope="col">Patient Photo</th>
                                        <th scope="col">Patient Mobile</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                    @foreach($details as $index=>$item)
                                    <tr>
                                        <th scope="row">{{$index+$details->firstItem()}}</th>
                                        @php
                                    $newdate=Carbon\Carbon::parse($item->created_at)->format('d/m/Y')
                                      
                                    @endphp
                                        <td>
                                        {{ $newdate}}
                                        </td>
                                        <td>{{$item->time_id}}</td>
                                        <td>
                                        {{$item->name}}
                                        </td>
                                        <td>  @if($item->image != null)<img src="{{url($item->image)}}" height="80" width="80"> @endif </td>
                                        <td>{{$item->contact}}</td>
                                        <td>{{$item->address}}</td>
                                        <td>
                                           
                                            <a href="{{url('delete/recent/approved/by/doctor')}}/{{$item->slug}}" class="btn btn-sm btn-danger rounded">Cancel</a>
                                        </td>
                                    </tr>
                               
                            
                                    @endforeach

                                </tbody>
                              </table>
                              {{ $details->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
