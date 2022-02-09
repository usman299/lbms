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
                            <li class="breadcrumb-item active">Lab Attendent</li>
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
                                <h3 class="card-title">Lab Attendent</h3>
                                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">Add New</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone#</th>
                                        <th>Business Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($labUser as $row)
                                        <tr>
                                            <td>{{$row->id}}</td>
                                            <td>{{$row->fname.' '.$row->lname}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->phone}}</td>

                                            <td>{{$row->business_name}}</td>

                                            <td>
                                                <a href="#" id="delete" class="btn btn-sm btn-danger" data-toggle="tooltip" title="edit">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                            </td>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Lab Attendent</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('admin.lab.store')}}" method="post" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>First Name</b><span class="text-danger">*</span></label>
                                <input type="text"  name="fname" required placeholder="First Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Last Name</b><span class="text-danger">*</span></label>
                                <input type="text"  name="lname" required placeholder="Last Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Email</b><span class="text-danger">*</span></label>
                                <input type="email"  name="email" required placeholder="Email" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Password</b><span class="text-danger">*</span></label>
                                <input type="password"  name="password" required placeholder="Password" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Business Name</b><span class="text-danger">*</span></label>
                                <input type="text"  name="business_name" required placeholder="Business Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Phone#</b><span class="text-danger">*</span></label>
                                <input type="text"  name="phone" required placeholder="Phone#" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Postal Code#</b><span class="text-danger">*</span></label>
                                <input type="text"  name="pc" required placeholder="Phone#" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Address</b><span class="text-danger">*</span></label>
                                <input type="text"  name="address1" required placeholder="address" class="form-control">
                            </div>
                        </div>
                        <input type="hidden" name="role" value="1">




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
