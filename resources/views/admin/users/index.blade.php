@extends('layouts.admin')
@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Admin Users</h3>
                            <button class="btn btn-primary btn-sm float-right" data-toggle="modal"
                                    data-target="#exampleModal">Create User Account
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Username</th>
                                    <th>Phone</th>
                                    <th>Permissions</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $row)
                                    <tr>
                                        <td>{{$row->fname.' '.$row->lname}}</td>
                                        <td>{{$row->email}}</td>
                                        <td>{{$row->username}}</td>
                                        <td>{{$row->phone}}</td>
                                        <td>
                                            @if($row->partner == 1)
                                                <small class="badge badge-primary"> Partners
                                                </small>
                                            @endif
                                            @if($row->patients == 1)
                                                <small class="badge badge-primary"> Patients
                                                </small>
                                            @endif
                                            @if($row->add_patients == 1)
                                                <small class="badge badge-primary">Add Patients
                                                </small>
                                            @endif
                                            @if($row->users == 1)
                                                <small class="badge badge-primary"> Users
                                                </small>
                                            @endif
                                        </td>
                                        <td>
                                            <a data-toggle="modal" data-target="#editmodal{{$row->id}}"
                                               class="btn btn-sm btn-primary" title="edit">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                            <a id="delete" href="{{route('users.delete', ['id' => $row->id])}}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                        <div class="modal fade" id="editmodal{{$row->id}}" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Create User
                                                            Account</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <div class="modal-body">
                                                        <form action="{{route('partner.update', ['id' => $row->id])}}"
                                                              method="post" enctype="multipart/form-data"
                                                              data-parsley-validate>
                                                            @csrf
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="title"><b>First Name</b><span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="fname"
                                                                           value="{{$row->fname}}" required
                                                                           class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="title"><b>Surname</b><span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="lname" required
                                                                           value="{{$row->lname}}" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="title"><b>User Name</b><span
                                                                            class="text-danger">*</span></label>
                                                                    <input id="username" type="username"
                                                                           value="{{$row->username}}" readonly
                                                                           class="form-control @error('username') is-invalid @enderror"
                                                                           name="username" value="{{ old('username') }}"
                                                                           required autocomplete="username">

                                                                    @error('username')
                                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="title"><b>Email</b><span
                                                                            class="text-danger">*</span></label>
                                                                    <input id="email" value="{{$row->email}}"
                                                                           type="email"
                                                                           class="form-control @error('email') is-invalid @enderror"
                                                                           name="email" value="{{ old('email') }}"
                                                                           required autocomplete="email">

                                                                    @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="title"><b>Phone</b><span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="text" name="phone"
                                                                           value="{{$row->phone}}" required
                                                                           class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="title"><b>Password</b><span
                                                                            class="text-danger">*</span></label>
                                                                    <input type="password" name="password"
                                                                           class="form-control">
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <label for="title"><b>Partners</b></label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input type="checkbox"
                                                                           {{$row->partner == 1 ? 'checked' : ''}} name="partner"
                                                                           value="1">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="title"><b>Patients</b></label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input
                                                                        {{$row->patients == 1 ? 'checked' : ''}} type="checkbox"
                                                                        name="patients" value="1">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="title"><b>Add Patients</b></label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input
                                                                        {{$row->add_patients == 1 ? 'checked' : ''}} type="checkbox"
                                                                        name="add_patients" value="1">
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label for="title"><b>Admin Users</b></label>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <input
                                                                        {{$row->users == 1 ? 'checked' : ''}} type="checkbox"
                                                                        name="users" value="1">
                                                                </div>
                                                            </div>
                                                    </div>
                                                    <hr>
                                                    <input type="hidden" name="role" value="0">
                                                    <div class="col-md-12 pull-right">
                                                        <div class="form-group">
                                                            <button type="submit"
                                                                    class="btn btn-primary btn-block">Submit
                                                            </button>
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                        </div>
                    </div>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create User Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('admin.lab.store')}}" method="post" enctype="multipart/form-data"
                          data-parsley-validate>
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>First Name</b><span class="text-danger">*</span></label>
                                <input type="text" name="fname" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Surname</b><span class="text-danger">*</span></label>
                                <input type="text" name="lname" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>User Name</b><span class="text-danger">*</span></label>
                                <input id="username" type="username"
                                       class="form-control @error('username') is-invalid @enderror" name="username"
                                       value="{{ old('username') }}" required autocomplete="username">

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Email</b><span class="text-danger">*</span></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Phone</b><span class="text-danger">*</span></label>
                                <input type="text" name="phone" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Password</b><span class="text-danger">*</span></label>
                                <input type="password" name="password" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="title"><b>Roles</b><span class="text-danger">*</span></label>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="title"><b>Partners</b></label>
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="partner" value="1">
                                </div>
                                <div class="col-md-3">
                                    <label for="title"><b>Patients</b></label>
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="patients" value="1">
                                </div>
                                <div class="col-md-3">
                                    <label for="title"><b>Add Patients</b></label>
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="add_patients" value="1">
                                </div>
                                <div class="col-md-3">
                                    <label for="title"><b>Admin Users</b></label>
                                </div>
                                <div class="col-md-3">
                                    <input type="checkbox" name="users" value="1">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <input type="hidden" name="role" value="0">
                        <div class="col-md-12 pull-right">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


        </div>

    </div></div>

@endsection
