@extends('layouts.admin')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                       Settings
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Settings</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">

            <div class="card card-primary card-outline">
                <div class="card-body">
                    <div class="row">
                        <div class="col-5 col-sm-3">
                            <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Certificate Settings</a>
                           </div>
                        </div>
                        <div class="col-7 col-sm-9">
                            <div class="tab-content" id="vert-tabs-tabContent">
                                <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                    <form action="{{route('certificate.settings')}}" method="post" enctype="multipart/form-data"
                                          data-parsley-validate>
                                        @csrf
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title"><b>Logo</b><span class="text-danger">*</span></label>
                                                <input type="file" name="logo" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="title"><b>Footer</b><span class="text-danger">*</span></label>
                                                <textarea name="footer" class="form-control"  id="summernote" cols="30" rows="10">{{$settings->footer}}</textarea>
                                            </div>
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

            </div>


        </div>

    </section>
@endsection
