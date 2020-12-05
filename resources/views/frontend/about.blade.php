@extends('frontend.master')

@section('content')
<div class="about-wrapper" id="about">
	<div class="container">
		<div class="row align-items-center justify-content-between about-text">
			<div class="col-md-12 col-lg-7">
				<div class="feature-img">
					<img style="width: 500px; height:500px;" src="{{url($abouts->image)}}" height="1100" width="740" class="img-fluid" alt="About Us">
				</div>
			</div>
			<div class="col-md-12 col-lg-5">
				<div class="text-block">
					<h6 class="heading-sm">About</h6>
					<h3>Summary Of Hospital</h3>
					<ul>
						<li>
							<p>
                                {{$abouts->text}}
							</p>
						</li>
					</ul>

					<hr>
					
				</div>
			</div>
		</div>
	</div>
</div>

@endsection