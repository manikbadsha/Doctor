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

<h2 style="text-align:center">Appointment's List</h2>
<br>

<table>
  <tr>
    <th>SL</th>
    <th>Doctor</th>
    <th>Patient</th>
    <th>Contact</th>
    <th>Day</th>
    <th>Time</th>
    <th>Date</th>
  </tr>
  <?php $sl=1 ?>
  @foreach ($datas as $data)
  <tr>
    <td>{{$sl}}</td>
    <td>
        {{$data->doctor_name}}
    </td>
    <td>{{$data->name}}</td>
    <td>
        {{$data->contact}}
    </td>
    <td>{{$data->date_id}}</td>
    <td>{{$data->time_id}}</td>
    <td>{{$data->appoinment_date}}</td>
  </tr>
  <?php $sl++ ?>
  @endforeach
</table>

</body>
</html>
      