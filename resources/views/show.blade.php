@extends('layouts.header')

@section('content')
    <div class="wrapper wrapper-content container  white-bg">
        @if (count($errors))
        @foreach($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible fade show " role="alert">
            <span class="alert-inner--icon"><i class="ni n
                .i-fat-remove"></i></span>
            <span class="alert-inner--text"><strong>Error!</strong> {{ $error }}</span>
            {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button> --}}
        </div>
        @endforeach
    @endif
        <div class="main-panel">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Portals <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#new_portal">
                        &nbsp;<i class="fa fa-plus"></i> New</button></h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table table-striped table-bordered table-hover tables">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Link</th>
                                            <th>Outside Link</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($portals as $portal)
                                            <tr>
                                                <td>{{$portal->title}}</td>
                                                <td><a href="{{$portal->link}}" target='_blank'> Link</a></td>
                                                <td><a href="{{$portal->outside_link}}" target='_blank'> Link</a></td>
                                                @if($portal->status == null) <td><div class="badge badge-success badge-pill text-white">Active</div> </td> 
                                                <td> <a onclick='show()' href='{{url('deactivate-portal/'.$portal->id)}}' ><button title="Deactivate" type="button" class="btn btn-danger btn-sm">
                                                    <span class="fa fa-trash-o"></span>
                                                  </button></a>
                                                </td>
                                                @else <td><div class="badge badge-danger badge-pill text-white">Inactive</div> </td>    <td> <a onclick='show()' href='{{url('activate-portal/'.$portal->id)}}' ><button title="Activate" type="button" class="btn btn-info btn-sm">
                                                    <span class="fa fa-check-square-o"></span>
                                                  </button></a>
                                                </td>@endif  
                                               
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @include('new_portal')
@endsection
@section('footer')
    <!-- Custom js for this page-->
    <script src="{{ asset('inside/login_css/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{ asset('inside/login_css/js/plugins/chosen/chosen.jquery.js') }}"></script>
    <script>
        $(document).ready(function(){
            
    
            $('.cat').chosen({width: "100%"});
            $('.tables').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},
    
                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');
    
                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]
    
            });
    
        });
    
    </script>
@endsection
