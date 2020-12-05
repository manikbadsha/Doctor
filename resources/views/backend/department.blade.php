@extends('backend.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                        <b>My Profile</b>
                    </div>
                <div class="card-body">
                <form action="{{url('add/new/department')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                    
                        <div class="form-group">
                            <label>Department:</label>
                            <input type="text" name="department" class="form-control" value="" class="@error('catagory_name') is-invalid @enderror" placeholder="DEp...." required>
                         </div>
                            @error('department')
                                    <div class="alert alert-danger">{{ $message }}</div>
                             @enderror

                             
                        <div class="form-group">
                            <label>Icon Class :</label>
                            <input type="text" name="icon" class="form-control" value="" class="@error('catagory_name') is-invalid @enderror" placeholder="DEp...." required>
                         </div>
                            @error('icon')
                                    <div class="alert alert-danger">{{ $message }}</div>
                             @enderror
                             <div class="form-group text-center">
                                <input type="submit" value="Add Department" class="btn btn-sm btn-success rounded">
                            
                            </div>
                </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <b>View All Department</b>
                </div>
                <div class="card-body">
                <table class="table table-striped">
                        <thead>
                            <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Department Name</th>
                            <th scope="col">Icon Class</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach($categories as $index=>$category)
                            
                            <tr>
                            <th scope="row">{{$index+$categories->firstItem()}}</th>
                            <td>{{$category->department}}</td>
                            <td>{{$category->icon}}</td>
                            <td>{{$category->created_at}}</td>
                            <td><a href="{{url('delete/category')}}/{{$category->id}}" class="btn btn-sm btn-danger rounded"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                <a href="{{url('edit/category')}}/{{$category->id}}" class="btn btn-sm btn-warning rounded"><i class="far fa-edit"></i></a>
                            </td>
                            
                            </tr>
                           
                            

                            @endforeach
                           
                        </tbody>
                </table>
                    {{$categories->links()}}
                </div>
            </div>
        </div>
    
    </div>
</div>

@endsection
