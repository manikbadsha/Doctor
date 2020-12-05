<h3>Dear {{$approve->name}}</h3>
<h3>Your Appoinment has been approved. Details of the appoinment has been given below :</h3>
<?php
    $doctor = DB::table('doctors')->where('user_id',$approve->doctor_id)->first();
    $newDate = Carbon\Carbon::createFromFormat('Y-m-d', $approve->appoinment_date)->format('jS F, Y');
?>
<b>Dcotor Name : {{$doctor->name}}</b><br>
<b>Dcotor Contact : {{$doctor->contact}}</b><br>
<b>Appoinmnet Date : {{$newDate}}</b><br>
<b>Appoinmnet Time : {{$approve->time_id}}</b><br>

<br>
<h3>Thank You.</h3>
