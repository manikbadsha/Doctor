@extends('frontend.master')

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-5 mb-5">
                        <div class="card-header bg-info text-white">
                            <b><i class="fas fa-user-md"></i> Doctor's List</b>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                  <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Department</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Degree</th>
                                    <th scope="col">Appoinment Date</th>
                                    <th scope="col">Appoinment Time Slot</th>
                                  </tr>
                                </thead>
                                <tbody>

                                    @foreach ($doctors as $doctor)
                                    <tr>
                                        <th scope="row">
                                            @if($doctor->image != null)
                                                <img src="{{url($doctor->image)}}" height="55" width="60">
                                            @endif
                                        </th>
                                        <td>{{$doctor->name}}</td>
                                        <td>{{$doctor->department_name}}</td>
                                        <td>{{$doctor->contact}}</td>
                                        <td>{{$doctor->degree}}</td>
                                        <td>
                                            @if($doctor->sat != null) Saturday,  @endif
                                            @if($doctor->sun != null) Sunday,  @endif
                                            @if($doctor->mon != null) Monday,  @endif
                                            @if($doctor->tue != null) Tuesday,  @endif
                                            @if($doctor->wed != null) Wednesday,  @endif
                                            @if($doctor->thu != null) Thursday,  @endif
                                            @if($doctor->fri != null) Friday,  @endif
                                        </td>
                                        <td>
                                            @php
                                                $times = DB::table('appoinment_times')->where('doctor_id',$doctor->user_id)->get();
                                            @endphp
                                            @foreach ($times as $time)
                                                {{$time->time}},
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
<div class="doctor-list" id="doctors-list">
	<div class="main">
		<div class="container">
			<div class="row">
				<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
					<div class="section-title">
						<h2>Doctor List</h2>
						<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
					</div>
				</div>
			</div>
			<section class="grid">
				
						@foreach($departments as $item)
				<a class="grid__item" href="{{url('doctor/by/deparmtent')}}/{{$item->department_id}}">
				<img style="height: 250px; width:auto" src="{{url($item->image)}}" class="img-responsive" alt="">
					
					<h2 class="title title--preview">{{$item->department}}</h2>
					<div class="loader"></div>
					<span class="dr-name">{{$item->name}}
					</span>
					<div class="meta meta--preview">

						<span class="meta__position">{{$item->department}}</span>
						<span class="meta__email">{{$item->email}}</span>
					</div>
					
				</a>
				@endforeach				
			</section>

		</div>
	</div>
</div>
@endsection
