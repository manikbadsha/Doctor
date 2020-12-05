@extends('frontend.master')

@section('content')

<div class="department mt-5" id="department-list">
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
@endsection
