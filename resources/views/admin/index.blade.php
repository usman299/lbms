@extends('layouts.admin')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->

            <div class="card-header">
                <form method="POST" action="{{route('filter.stats')}}">
                    @csrf
                     <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">Start Date</label>
                                    <input  type="date" name="s_date" placeholder="dd-mm-yyyy"  required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="">End Date</label>
                                    <input type="date" name="e_date" placeholder="dd-mm-yyyy"   required class="form-control">
                                </div>
                            </div>

                            <div class="col-md-2 ">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary" style="margin-top: 33.5px" >Search</button>
                                </div>
                            </div>
                        </div>
                 </form>

                </div>
            <div class="row">
                @if(Auth::user()->role == 0)
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-dark">
                        <div class="inner">
                            <h3>{{$labortaries->count()}}</h3>

                            <p>Total Partners
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-handshake"></i>
                        </div>
{{--                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>
                @endif
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$users->count()}}</h3>

                            <p>Total Patients
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-ambulance"></i>
                        </div>
{{--                        <a href="{{route('patients')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{$users->where('status', 0)->count()}}</h3>

                            <p>Awaiting Result</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-spinner"></i>
                        </div>
{{--                        <a href="{{route('patients.status', ['id' => 0])}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$users->where('status', 1)->count()}}</h3>

                            <p>Positive</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-plus"></i>
                        </div>
{{--                        <a href="{{route('patients.status', ['id' => 1])}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$users->where('status', 2)->count()}}</h3>

                            <p>Negative</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-minus"></i>
                        </div>
{{--                        <a href="{{route('patients.status', ['id' => 2])}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$users->where('status', 3)->count()}}</h3>

                            <p>Inconclusive</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-question"></i>
                        </div>
{{--                        <a href="{{route('patients.status', ['id' => 3])}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>--}}
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        @if(Auth::user()->role == 2)
        <div class="row">
            <div class="col-md-12">
                <div class="card p-4">
                    <h3>That’s the URL where patients can self register under partner

                    </h3>

                    <p>{{route('patient.create.direct', ['id' => \Illuminate\Support\Facades\Auth::user()->id ])}}</p>
                </div>

            </div>
        </div>
            @endif
    </section>
@endsection
