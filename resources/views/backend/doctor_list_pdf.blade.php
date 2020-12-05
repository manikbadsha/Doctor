<!DOCTYPE html>
<html>
<head>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<h2 style="text-align:center">Doctor's List</h2>
<br>

<table>
  <tr>
    <th>Image</th>
    <th>Name</th>
    <th>Speciality</th>
    <th>Contact</th>
    <th>Day</th>
    <th>Shift</th>
    <th>Joining date</th>
  </tr>

  @foreach ($datas as $data)
  <tr>
    <td>
        <img src="{{ public_path($data->image) }}" height="40" width="50">
    </td>
    <td>{{$data->name}}</td>
    <td>
        <?php
            $dept = DB::table('departments')->where('id',$data->department_id)->first();
        ?>
        {{$dept->department}}
    </td>
    <td>{{$data->contact}}</td>
    <td>
        @if($data->sat != null) Sat, @endif
        @if($data->sun != null) Sun, @endif
        @if($data->mon != null) Mon, @endif
        @if($data->tue != null) Tue, @endif
        @if($data->wed != null) Wed, @endif
        @if($data->thu != null) Thu, @endif
        @if($data->fri != null) Fri @endif
    </td>
    <td>
        <?php
            $doctor = DB::table('doctors')->where('id',$data->id)->first();
            $working_times = DB::table('appoinment_times')->where('doctor_id',$doctor->user_id)->get();
        ?>
        @foreach($working_times as $working_time)
            {{$working_time->time}},
        @endforeach
    </td>
    <td>
        <?php
            $newDate = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $data->created_at)->format('d/m/Y');
        ?>
        {{$newDate}}
    </td>
  </tr>
  @endforeach
</table>

</body>
</html>
