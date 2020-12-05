@extends('frontend.master')

@section('content')


<!-- /.about us -->

<div class="department" id="department-list">
	<div class="container">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3">
				<div class="section-title">
					<h2>Department List</h2>
					<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
				</div>
			</div>
		</div>
		<div class="row">
			
			
						@php
                        $departments=DB::table('departments')->get();
                        @endphp

			@foreach($departments as $item)
			<div class="col-6 col-md-4 col-lg-2">
				<div class="box-widget">
					<a href="{{url('doctor/by/deparmtent')}}/{{$item->id}}">
						<div class="box-icon">
							<i class="{{$item->icon}}"></i>
						</div>
						<div class="box-text">
							<h5>{{$item->department}}</h5>
						</div>
					</a>
				</div>
				<!-- /.box widget -->
			</div>
			@endforeach
			
			
			
			
			
		</div>
	</div>
</div>
<!-- /.department -->

<div id="appointment-form" class="appointment-content">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-12 col-lg-6 demo-left">
				<div class="appointment-text">
					<h1>Book with your doctor</h1>
					<h3>Some up and coming trends are healthcare consolidation for independent healthcare centers that see a cut in unforeseen payouts.</h3>
					<div class="row">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<div class="media contact-service">
								<i class="flaticon-world mr-3"></i>
								<div class="media-body">
									<h4 class="mt-0">Address</h4>
									<div>12/A,Sector: 10, Uttara-1230, Dhaka</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-12 col-md-12 col-lg-5 offset-lg-1">
				<div class="form-container">

					<!-- Message & exception -->
					<div class="col-sm-12"></div>

					<div class="tab-content" id="nav-tabContent">
						<a href="{{url('home')}}" class="btn btn-success">
              <i class="icon-calendar"></i> Take Appointment
            </a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- client part -->

<!-- /.partners -->

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
						@php
						 $departments=DB::table('doctors')
									->join('departments','doctors.department_id','=','departments.id')
									->join('users','doctors.user_id','=','users.id')
									->select('doctors.*','departments.department','users.email')
									->take(4)
									->get();
                        @endphp

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
<!-- /.doctor list -->

<!-- /.blog -->
<!-- end main content -->

<div class="appointment text-center">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2>Make an appointment!
					<a href="{{url('home')}}" class="appointment-link js-scroll-trigger">Go there
						<i class="ti-arrow-right"></i>
					</a>
				</h2>
			</div>
		</div>
	</div>
</div>
<!-- /.appointment block -->
@endsection
