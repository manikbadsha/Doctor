@extends('frontend.master')

@section('content')
<style>
    .xdsoft_time_variant{
        display: none;
    }
</style>
    <section>
        <div class="container">
            <div class="card mt-5 mb-5">
                <div class="card-header bg-info text-white">
                    <b>Book Your Appoinment</b>
                </div>
                <div class="card-body">
                    <form action="{{url('book/appoinment')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><b>Chose Your Department <span class="text-danger">*</span></b></label>
                                    <select class="form-control border border-black" name="dept_id" id="dept_id" required>
                                        <option value="">Select One</option>
                                        @foreach ($departments as $department)
                                            <option value="{{$department->id}}">{{$department->department}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><b>Chose Your Doctor <span class="text-danger">*</span></b></label>
                                    <select class="form-control border border-black" name="doctor_id" id="doctor_id" required>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><b>Doctor's Day of Appoinment <span class="text-danger">*</span></b></label>
                                    <select class="form-control border border-black" name="date_id" id="date_id" required>

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><b>Doctor's Time of Appoinment <span class="text-danger">*</span></b></label>
                                    <select class="form-control border border-black" name="time_id" id="time_id" required>

                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><b>Chose Your Date <span class="text-danger">*</span></b></label>
                                    <input id="datetimepicker5" type="text" class="form-control border border-black" name="appoinment_date" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><b>Your Contact <span class="text-danger">*</span></b></label>
                                    <input type="text" class="form-control border border-black" name="contact" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><b>Full Name <span class="text-danger">*</span></b></label>
                                    <input type="text" class="form-control border border-black" name="name" value="{{Auth::user()->name}}" required>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label><b>Email <span class="text-danger">*</span></b></label>
                                    <input type="email" class="form-control border border-black" name="email" value="{{Auth::user()->email}}" required>
                                </div>
                            </div>
                            <div class="col-lg-4 text-center pt-4">
                                <input type="submit" value="Book Appoinment" class="btn btn-info">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



@endsection

@section('footer_js')
<script>
	$(document).ready(function() {
		$('#dept_id').on('change', function() {
			var div_id = $(this).val();
			if (div_id) {
				$.ajax({
					url: '/findDoctorWithDepartment/' + div_id,
					type: "GET",
					data: {
						"_token": "{{ csrf_token() }}"
					},
					dataType: "json",
					success: function(data) {
						// console.log(data);
						if (data) {
							$('#doctor_id').empty();
							$('#doctor_id').focus;
							$('#doctor_id').append('<option value="">-- Select Doctor --</option>');
							$.each(data, function(key, value) {
								$('select[name="doctor_id"]').append('<option value="' + value.user_id + '">' + value.name + '</option>');
							});
						} else {
							$('#doctor_id').empty();
						}
					}
				});
			} else {
				$('#doctor_id').empty();
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#doctor_id').on('change', function() {
			var div_id = $(this).val();
			if (div_id) {
				$.ajax({
					url: '/findDateWithDoctor/' + div_id,
					type: "GET",
					data: {
						"_token": "{{ csrf_token() }}"
					},
					dataType: "json",
					success: function(data) {
						// console.log(data);
						if (data) {
							$('#date_id').empty();
							$('#date_id').focus;
							$('#date_id').append('<option value="">-- Select Doctor --</option>');
							$.each(data, function(key, value) {
								$('select[name="date_id"]').append('<option value="' + value.date + '">' + value.date + '</option>');
							});
						} else {
							$('#date_id').empty();
						}
					}
				});
			} else {
				$('#date_id').empty();
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#doctor_id').on('change', function() {
			var div_id = $(this).val();
			if (div_id) {
				$.ajax({
					url: '/findTimeWithDoctor/' + div_id,
					type: "GET",
					data: {
						"_token": "{{ csrf_token() }}"
					},
					dataType: "json",
					success: function(data) {
						// console.log(data);
						if (data) {
							$('#time_id').empty();
							$('#time_id').focus;
							$('#time_id').append('<option value="">-- Select Doctor --</option>');
							$.each(data, function(key, value) {
								$('select[name="time_id"]').append('<option value="' + value.time + '">' + value.time + '</option>');
							});
						} else {
							$('#time_id').empty();
						}
					}
				});
			} else {
				$('#time_id').empty();
			}
		});
	});
</script>

<script>
    $('#datetimepicker5').datetimepicker({
        minDate:0, // disable past date
    });

    var currentYear = new Date();
    $('#datetimepicker5').datetimepicker({
        format:'Y-m-d',
        minDate : 0,
        yearStart : currentYear.getFullYear(), // Start value for current Year selector
        // onChangeDateTime:checkPastTime,
        // onShow:checkPastTime
    });
    </script>


@endsection