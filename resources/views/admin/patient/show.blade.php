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
                            <h3 class="card-title">Patient Details {{$user->u_r_num}}</h3>
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
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Address Line 1: </b>{{$user->address1}}</font></font></p>
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Address Line 2 : </b>{{$user->address2}}</font></font></p>
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Postal Code : </b>{{$user->postal}}</font></font></p>
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Gender : </b>{{$user->gender}}</font></font></p>
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Date of Birth : </b>{{$user->dob}}</font></font></p>
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Town : </b>{{$user->town}}</font></font></p>
                                                    <p class="mb-1"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><b>Country : </b>{{$user->country}}</font></font></p>
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
                                                                        <small class="badge badge-warning">Positive</small>
                                                                    @elseif($user->status ==2)
                                                                        <small class="badge badge-danger">Negative</small>
                                                                    @elseif($user->status ==3)
                                                                        <small class="badge badge-primary">Inconclusive</small>
                                                                    @endif
                                                                </font></font></strong></p>
                                                    <br>
                                                    <br>
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
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
