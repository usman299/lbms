@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add new Patient</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default col-md-8 offset-2">
                <div class="card-header">
                    <h2 class="card-title"><b><u>Update Partner Details</u></b></h2>


                </div>
                <form action="{{route('partner.update', ['id' => $user->id])}}" method="post" enctype="multipart/form-data" data-parsley-validate>
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title"><b>Business Name</b><span class="text-danger">*</span></label>
                            <input type="text" value="{{$user->business_name}}"  name="business_name" required placeholder="Business Name" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title"><b>Business Email</b><span class="text-danger">*</span></label>
                            <input id="email" value="{{$user->email}}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                            <input type="text" value="{{$user->phone}}"  name="phone" required placeholder="Phone#" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title"><b>Business Address Line 1</b><span class="text-danger">*</span></label>
                            <input type="text" value="{{$user->address1}}"   name="address1" required placeholder="Address" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title"><b>Business Address Line 2</b></span></label>
                            <input type="text" value="{{$user->address2}}"   name="address2"  placeholder="Address" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title"><b>Business Postcode #</b><span class="text-danger">*</span></label>
                            <input type="text" value="{{$user->postal}}"  name="pc" required placeholder="Phone#" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title"><b>Business Charge Rate For PCR</b><span class="text-danger">*</span></label>
                            <input type="text" value="{{$user->pcr_rate}}"   name="pcr_rate" required placeholder="e.g £30" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                            <div class="form-group">
                                <label for="title"><b>Username</b><span class="text-danger">*</span></label>
                                <input id="username" type="username" readonly class="form-control @error('username') is-invalid @enderror" name="username" value="{{$user->username}}"  required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title"><b>Password</b><span class="text-danger">*</span></label>
                            <input type="password"   name="password" placeholder="Password" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title"><b>First Name</b><span class="text-danger">*</span></label>
                            <input type="text" value="{{$user->fname}}"  name="fname" required placeholder="First Name" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title"><b>Sur Name</b><span class="text-danger">*</span></label>
                            <input type="text" value="{{$user->lname}}"  name="lname" required placeholder="Last Name" class="form-control">
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
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <script type="text/javascript">
        const element = document.getElementById('date-input');
        element.valueAsNumber = Date.now()-(new Date()).getTimezoneOffset()*60000;
    </script>
@endsection
