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
                            <h3 class="card-title">Patient Details # <b>{{$user->u_r_num}}</b></h3>
                            @if(Auth::user()->role == 0)
                              @if(!empty($user->certificate_link))
                                <a target="_blank" href="{{asset($user->certificate_link)}}"><button class="btn btn-warning btn-sm float-right">Download Certificate
                                    </button>
                                </a>
                                @endif
                                <button data-toggle="modal" data-target="#exampleModal" class="btn btn-primary btn-sm float-right mr-2">ADD TO LAB</button>
                             @endif
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="card border shadow-none radius-10">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="icon-box bg-light-primary border-0">
                                                    <i class="bi bi-person text-primary"></i>
                                                </div>
                                                <div class="info">
                                                    <h6 class="mb-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Personal Information</b></font></font></h6>
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Name : </b>{{$user->fname}} {{$user->lname}}</font></font></p>
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Email : </b>{{$user->email}}</font></font></p>
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Phone : </b>{{$user->phone}}</font></font></p>
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Gender : </b>{{$user->gender}}</font></font></p>
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Date of Birth : </b>{{$user->dob->format('d-m-Y')}}</font></font></p>
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Passport: </b>{{$user->passport}}</font></font></p>
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>House No / Name: </b>{{$user->address1}}</font></font></p>
                                                    <!-- <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Address Line 2 : </b>{{$user->address2}}</font></font></p> -->



                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Street : </b>{{$user->town}}</font></font></p>
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Postal Code : </b>{{$user->postal}}</font></font></p>
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Country : </b>{{$user->country}}</font></font></p>

                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Swab Date : </b>{{$user->swab_date->format('d-m-Y')}}</font></font></p>
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Swab Time : </b>{{$user->swab_time}}</font></font></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card border shadow-none radius-10">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="icon-box bg-light-success border-0">
                                                    <i class="bi bi-truck text-success"></i>
                                                </div>
                                                <div class="info">
                                                    <h6 class="mb-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Status</b></font></font></h6>
                                                    <p class="mb-1"><strong><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                                                                    @if($user->status == 0)
                                                                        <small class="badge badge-success"><i class="far fa-clock"></i> Awaiting Result
                                                                        </small>
                                                                    @elseif($user->status ==1)
                                                                        <small class="badge badge-danger">Positive</small>
                                                                    @elseif($user->status ==2)
                                                                        <small class="badge badge-success">Negative</small>
                                                                    @elseif($user->status ==3)
                                                                        <small class="badge badge-warning">Inconclusive</small>
                                                                    @endif
                                                                </font></font></strong></p>
                                                    <br>
                                                    <br>
                                                    @if(Auth::user()->role == '0')
                                                    <h6 class="mb-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Change Status</b></font></font></h6>
                                                        <div class="row">
                                                        <div class="col-12">
                                                            <select  onchange="location = this.value;" class="form-control" id="">
                                                                <option value="">Change Status</option>
                                                                <option value="{{route('patient.status', ['id' => $user->id, 'status' => 1])}}">Positive</option>
                                                                <option value="{{route('patient.status', ['id' => $user->id, 'status' => 2])}}">Negative</option>
                                                                <option value="{{route('patient.status', ['id' => $user->id, 'status' => 3])}}">Inconclusive</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    @if(Auth::user()->role == 0)
                                    <th>Batch No</th>
                                    <th>Sample</th>
                                    @endif
                                    <th>Test Date</th>
                                    <th>Test Time</th>
                                     @if(Auth::user()->role == 0)
                                    <th>Action</th>
                                     @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($user->batches as $row)
                                    <tr>
                                        @if(Auth::user()->role == 0)
                                        <td>{{$row->batch_no}}</td>
                                        <td>{{$row->sample}}</td>
                                        @endif
                                        <td>{{$row->test_date->format('d-m-Y')}}</td>
                                        <td>{{$row->test_time}}</td>
                                         @if(Auth::user()->role == 0)
                                        <td>
                                            <a href="#" class="show-modal btn btn-sm btn-dark" data-toggle="tooltip" title="Edit"  data-id="{{$row->id}}" data-batch="{{$row->batch_no}}" data-sample="{{$row->sample}}" data-date1="{{$row->test_date->format('Y-m-d')}}" data-time="{{$row->test_time}}">
                                                <i class="fa fa-pen"></i>
                                            </a>

                                            <a id="delete" href="{{route('batch.delete', ['id' => $row->id])}}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        </td>
                                         @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Batch No</b><span class="text-danger">*</span></label>
                                <input type="text"  name="batch_no" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Sample</b><span class="text-danger">*</span></label>
                                <input type="text"  name="sample" required  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Test Date
                                    </b><span class="text-danger">*</span></label>
                                <input type="date" id="date-input"  name="test_date" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Test Time   </b><span class="text-danger">*</span></label>
                                <input type="time"  name="test_time" required  class="form-control">
                            </div>
                        </div>
                    <!--     <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Status </b><span class="text-danger">*</span></label>
                                <select name="status" class="form-control" id="">
                                    <option value="1">Complete</option>
                                    <option value="2">Reject</option>
                                </select>
                            </div>
                        </div> -->

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



    <div class="modal fade" id="show" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Batch Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('batch.update')}}" method="post" enctype="multipart/form-data" data-parsley-validate>
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Batch No</b><span class="text-danger">*</span></label>
                                <input type="text"  name="batch_no" id="batch" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Sample</b><span class="text-danger">*</span></label>
                                <input type="text"  name="sample" required id="sample"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Test Date
                                    </b><span class="text-danger">*</span></label>
                                <input type="date" id="date1"  name="test_date"   required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Test Time   </b><span class="text-danger">*</span></label>
                                <input type="time"  name="test_time" required id="time"  class="form-control">
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
</div>




@endsection


