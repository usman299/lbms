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