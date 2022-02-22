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
                        <li class="breadcrumb-item active">All patients</li>
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
                            <h3 class="card-title"></h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="https://leads.a2z-techsolutions.com/lead/export" data-toggle="modal" data-target="#modal-default1" class="btn btn-sm btn-warning"><i class="fa fa-arrow-down"></i>  Import Comments</a>
                                    <a href="https://leads.a2z-techsolutions.com/lead/export" class="btn btn-sm btn-primary"><i class="fa fa-arrow-up"></i>  Export Leads</a>
                                    <a href="" class="btn btn-sm btn-dark" data-toggle="modal" data-target="#modal-default"><i class="fa fa-arrow-down"></i>  Import Leads</a>
                                </div>
                                <div class="col-md-6">
                                    <form action="{{route('search.registration')}}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4 style="float: right;" class="mt-1">Search by Registration: </h4>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="date" name="date" style="float: right;" class="form-control">
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-sm btn-success mt-1" style="float: left;"><i class="fa fa-search"></i> Search</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>


                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Registration</th>
                                    <th>Barcode</th>
                                    @if(Auth::user()->role == 0)
                                    <th>Partner</th>
                                    @endif
                                    <th>Customer Name</th>
                                    <th>Status</th>
                                    <th class="text-center">LAB Details</th>
                                    <th>Action</th>
                                    @if(Auth::user()->role == 0)
                                    <th>Mail Status</th>
                                    <th>Admin Tools</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $row)

                                 @php
                                $user = \App\User::find($row->id);
                                @endphp
                                    <tr>
                                        <td>{{$row->created_at->format('d-m-Y H:i')}}</td>
                                        <td>{{$row->u_r_num}}</td>
                                        @if(Auth::user()->role == 0)
                                        <td>{{$row->creator->business_name??''}}</td>
                                        @endif
                                        <td>{{$row->fname.' '.$row->lname}}</td>
                                        <td>
                                            @if($row->status == 0)
                                                <small class="badge badge-primary"><i class="far fa-clock"></i> Awaiting Result
                                                </small>
                                            @elseif($row->status ==1)
                                                <small class="badge badge-danger">Positive</small>
                                            @elseif($row->status ==2)
                                                <small class="badge badge-success">Negative</small>
                                             @elseif($row->status ==3)
                                                <small class="badge badge-warning">Inconclusive</small>
                                            @endif
                                           </td>
                                           <td>
                                                <table class="table table-bordered table-striped">

                                                        <tr>
                                                            <th>Batch no</th>
                                                            <th>Sample</th>
                                                            <th>Test Date</th>
                                                            <th>Test Time</th>
                                                        </tr>

                                                        @foreach($user->batches as $raw)
                                                          <tr>
                                                            @if(Auth::user()->role == 0)
                                                            <td>{{$raw->batch_no}}</td>
                                                            <td>{{$raw->sample}}</td>
                                                            @endif
                                                            <td>{{$raw->test_date->format('d-m-Y')}}</td>
                                                            <td>{{$raw->test_time}}</td>
                                                         </tr>
                                                        @endforeach
                                                    </table>

                                           </td>

                                        <td>
                                            <a href="{{route('patient.show', ['id' => $row->id])}}" class="btn btn-sm btn-success" data-toggle="tooltip" title="View">
                                                <i class="fa fa-eye"></i>
                                            </a>

                                            <a href="{{route('patient.edit', ['id' => $row->id])}}" class="btn btn-sm btn-dark" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-pen"></i>
                                            </a>

                                            <a id="delete" href="{{route('patient.delete', ['id' => $row->id])}}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-times"></i>
                                            </a>
                                         </td>
                                         @if(Auth::user()->role == 0)
                                         <td>
                                             @if($row->mailstatus == 0)
                                                 <small class="badge badge-primary"><i class="far fa-clock"></i> Awaiting
                                                 </small>
                                             @elseif($row->mailstatus ==1)
                                                 <small class="badge badge-success">Delivered</small>
                                             @elseif($row->mailstatus ==2)
                                                 <small class="badge badge-danger">Failed</small>
                                             @endif
                                         </td>
                                         <td>
                                          <a href="#" class="showmodal btn btn-sm btn-primary" data-toggle="tooltip" title="Add to Lab"  data-id="{{$row->id}}" >
                                                Add to Lab
                                            </a>

                                            @if(!empty($user->certificate_link))
                                            <a target="_blank" href="{{asset($user->certificate_link)}}"><button class="btn btn-warning btn-sm "><i class="fa fa-download"> </i> Certificate
                                                </button>
                                            </a>
                                            <a href="{{route('email.resend', ['id' => $user->id])}}"><button class="btn btn-success btn-sm "><i class="fa fa-mail-bulk"> </i> Resend Email
                                                </button>
                                            </a>
                                           @endif
                                        </td>
                                        @endif
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

    <div class="modal fade" id="addlab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Batch No</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('batch.store')}}" method="post" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Batch No</b><span class="text-danger">*</span></label>
                                <input type="text"  name="batch_no" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Sample</b><span class="text-danger">*</span></label>
                                <input type="text"  name="sample" required   class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Test Date
                                    </b><span class="text-danger">*</span></label>
                                <input type="date" id="date-input"  name="test_date"   required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Test Time   </b><span class="text-danger">*</span></label>
                                <input type="time"  name="test_time" required   class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <!-- <div class="form-group">
                                <label for="title"><b>Status </b><span class="text-danger">*</span></label>
                                <select name="status" class="form-control" id="">
                                    <option value="1">Complete</option>
                                    <option value="2">Reject</option>
                                </select>
                            </div> -->
                        </div>

                        <div class="col-md-12 pull-right">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



        </div>

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
