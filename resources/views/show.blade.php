@extends('layouts.header')

@section('content')

    <div class="container page-body-wrapper mt-3">
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
        <ul class="nav  nav-pills nav-pills-custom" id="pills-tab-custom" >
            <li class="nav-item ">
                <a class="nav-link @if($header == 'Portal')active @endif"   href="{{url('applications')}}" >
                    Portals
                </a>
            </li>
        </ul>
        <div class="main-panel">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Portals <button type="button" class="btn btn-outline-success btn-icon-text btn-sm"  data-toggle="modal" data-target="#new_portal">
                        &nbsp;<i class="ti-plus btn-icon-prepend"></i></button></h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
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
                                                <td> <a onclick='show()' href='{{url('deactivate-portal/'.$portal->id)}}' ><button title="Deactivate" type="button" class="btn btn-inverse-danger btn-icon btn-sm">
                                                    <span class="ti-trash"></span>
                                                  </button></a>
                                                </td>
                                                @else <td><div class="badge badge-danger badge-pill text-white">Inactive</div> </td>    <td> <a onclick='show()' href='{{url('activate-portal/'.$portal->id)}}' ><button title="Activate" type="button" class="btn btn-inverse-success btn-icon btn-sm">
                                                    <span class="ti-check"></span>
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
    <script src="{{ asset('js/data-table.js') }}"></script>
    <!-- End custom js for this page-->
@endsection
