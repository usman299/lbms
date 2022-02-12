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
                            <li class="breadcrumb-item active">Partners</li>
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
                                <h3 class="card-title">Partners</h3>
                                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">Create Partner Account</button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Order No</th>
                                        <th>Business Name</th>
                                        <th>Email</th>
                                        <th>Phone#</th>
                                        <th>Address Line 1</th>
                                        <th>Address Line 2</th>
                                        <th>Postcode</th>
                                        <th>Charge Rate For PCR</th>
                                        <th>Full Name</th>
                                        

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($labUser as $row)
                                        <tr>
                                            <td>{{$row->id}}</td>
                                            <td>{{$row->business_name}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>{{$row->phone}}</td>
                                            <td>{{$row->address1}}</td>
                                            <td>{{$row->address2}}</td>
                                            <td>{{$row->postal}}</td>
                                            <td>{{$row->pcr_rate}}</td>
                                            <td>{{$row->fname.' '.$row->lname}}</td>
                                            
                                            
                                            
                                            

{{--                                            <td>--}}
{{--                                                <a href="#" id="delete" class="btn btn-sm btn-danger" data-toggle="tooltip" title="edit">--}}
{{--                                                    <i class="fa fa-times"></i>--}}
{{--                                                </a>--}}
{{--                                            </td>--}}
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
                    <h5 class="modal-title" id="exampleModalLabel">Create Partner Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('admin.lab.store')}}" method="post" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Business Name</b><span class="text-danger">*</span></label>
                                <input type="text"  name="business_name" required placeholder="Business Name" class="form-control">
                            </div>
                        </div>

                         <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Business Email</b><span class="text-danger">*</span></label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Business Phone#</b><span class="text-danger">*</span></label>
                                <input type="text"  name="phone" required placeholder="Phone#" class="form-control">
                            </div>
                        </div>

                         <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Business Address Line 1</b><span class="text-danger">*</span></label>
                                <input type="text"  name="address1" required placeholder="Address" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Business Address Line 2</b></span></label>
                                <input type="text"  name="address2"  placeholder="Address" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Business Postcode #</b><span class="text-danger">*</span></label>
                                <input type="text"  name="pc" required placeholder="Phone#" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Business Charge Rate For PCR</b><span class="text-danger">*</span></label>
                                <input type="text"  name="pcr_rate" required placeholder="e.g £30" class="form-control">
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
                                <label for="title"><b>First Name</b><span class="text-danger">*</span></label>
                                <input type="text"  name="fname" required placeholder="First Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Sur Name</b><span class="text-danger">*</span></label>
                                <input type="text"  name="lname" required placeholder="Last Name" class="form-control">
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
