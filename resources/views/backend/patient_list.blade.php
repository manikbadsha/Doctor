@extends('backend.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mt-3 rounded">
                    <div class="card-header bg-danger text-white rounded">
                        <b><i class="fas fa-user-injured"></i>  Patient List</b>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th scope="col">P-ID</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Email</th>
                                <th scope="col">NID</th>
                                <th scope="col">Address</th>
                                <th scope="col">Actions</th>
                              </tr>
                            </thead>
                            <tbody>

                                @foreach ($infos as $info)
                                <tr>
                                    <th scope="row">{{$info->id}}</th>
                                    <td>
                                        @if($info->image != null)
                                            <img src="{{url($info->image)}}" width="60px">
                                        @endif
                                    </td>
                                    <td>{{$info->name}}</td>
                                    <td>{{$info->contact}}</td>
                                    <td>{{$info->email}}</td>
                                    <td>{{$info->nid}}</td>
                                    <td>{{$info->address}}</td>
                                    <td>
                                        <a href="{{url('delete/patient')}}/{{$info->id}}" class="btn btn-danger btn-sm rounded"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                          </table>

                          {{ $infos->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
