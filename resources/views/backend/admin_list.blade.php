@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="card mt-3 rounded">
                    <div class="card-header bg-success text-white rounded">
                        <b><i class="fas fa-users-cog"></i> Admin Registration</b>
                    </div>
                    <div class="card-body">
                        <form action="{{url('add/new/admin')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label><b>Name :</b></label>
                                <input type="test" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><b>Email :</b></label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label><b>Password :</b></label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label><b>Confirm Password :</b></label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                            </div>

                            <script>
                                var password = document.getElementById("password")
                                , confirm_password = document.getElementById("confirm_password");

                                function validatePassword(){
                                    if(password.value != confirm_password.value) {
                                        confirm_password.setCustomValidity("Passwords Don't Match");
                                    }
                                    else {
                                        confirm_password.setCustomValidity('');
                                    }
                                }

                                password.onchange = validatePassword;
                                confirm_password.onkeyup = validatePassword;
                            </script>

                            <div class="form-group text-center pt-4">
                                <input type="submit" value="Register" class="btn btn-sm btn-success rounded">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card mt-3 rounded">
                    <div class="card-header bg-success text-white rounded">
                        <b><i class="fas fa-users-cog"></i> Admin's List</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($infos as $info)
                                <tr>
                                    <th scope="row">{{$info->id}}</th>
                                    <td>{{$info->name}}</td>
                                    <td>{{$info->email}}</td>
                                    <td>{{$info->user_type}}</td>
                                    <td>
                                        <a href="{{url('delete/admin')}}/{{$info->id}}" class="btn btn-danger btn-sm rounded"><i class="fas fa-trash-alt"></i></a>
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
@endsection
