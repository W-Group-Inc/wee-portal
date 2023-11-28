@extends('layouts.header')
@section('css')

<link href="{{asset('inside/login_css/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet')}}">
<style>
 .bulletin_files{
        overflow:scroll;
        overflow-x: hidden;
        max-height: 20vh;
    }
</style>
@endsection
@section('content')
<div class="wrapper wrapper-content container">
    <div class="row">
        <div class="col-lg-3">
            <div class="ibox">
                <div class="ibox-content">
                    <div>
                        <img src="{{asset(auth()->user()->employee->avatar)}}"  onerror="this.src='{{URL::asset('/images/no_image.png')}}';" class="img-circle img-sm circle-border" style='width:50px;height:50px;vertical-align:middle;' alt="profile">
                       
                        <b><span style=""> {{auth()->user()->name}}<br></span></b>
                      </div>
                      <h6><i class="fa fa-envelope"></i>  {{auth()->user()->email}} <br></h6>
                      <h6><i class="fa fa-window-maximize"></i> {{auth()->user()->employee->department->name}}  <br></h6>
                        <h6><i class="fa fa-briefcase"></i> {{auth()->user()->employee->position}}<br></h6>
                </div>
            </div>
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Welcome to </h5><label class='label label-success'>{{auth()->user()->employee->company->company_name}}</label>
                </div>
                <div class="ibox-content">
                    <ul class="list-unstyled file-list">
                        @foreach($documents as $document)
                        @include('view_document')
                        <li><a href="#"  data-target="#view_document{{$document->id}}" data-toggle="modal" ><i class="fa fa-file"></i> {{$document->name}}</a></li>
                        @endforeach
                        <hr>
                        <li><a href="#"  data-target="#public_forms" data-toggle="modal"><i class="fa fa-file"></i> Public Forms</a></li>
                        <hr>
                        <li><a href="https://docs.google.com/spreadsheets/d/1pPMcr_zVFEl8EP1iPGAtFEHSoQxsIKnbzmpTeqBh-Q8/edit?pli=1#gid=2100853057" target='_blank'><i class="fa fa-phone-square"></i> Telephone Directory</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Welcome new Hires</h5>
                    <div class="ibox-tools">
                        <span class="label label-warning-light pull-right">{{date('M. Y')}}</span>
                        </div>
                </div>
                <div class="ibox-content">

                    <div>
                        <div class="feed-activity-list">
                            @foreach($employees as $employee)
                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle img-sm"  src="{{URL::asset($employee->avatar)}}"  onerror="this.src='{{URL::asset('/images/no_image.png')}}';">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">{{date('M. d',strtotime($employee->original_date_hired))}}</small>
                                    <strong>{{$employee->user->name}}</strong><br>
                                    <small class="text-muted">{{$employee->company->company_name}}</small><br>
                                    <small class="text-muted">{{$employee->position}}</small>

                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Birthday Celebrants</h5>
                    <div class="ibox-tools">
                        <span class="label label-warning-light pull-right">{{date('M. Y')}}</span>
                        </div>
                </div>
                <div class="ibox-content">
                    <div>
                        <div class="feed-activity-list">
                            @foreach($employee_birthday_celebrants as $birthdate)
                            <div class="feed-element">
                                <a href="#" class="pull-left">
                                    <img alt="image" class="img-circle" src="{{URL::asset($birthdate->avatar)}}"  onerror="this.src='{{URL::asset('/images/no_image.png')}}';">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">{{date('M. d',strtotime($birthdate->birth_date))}}</small>
                                    <strong>{{$birthdate->user->name}}</strong><br>
                                    <small class="text-muted">{{$birthdate->company->company_name}}</small>

                                </div>
                            </div>  
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
           
            <div class="ibox float-e-margins ">
                <div class="ibox-title">
                    <h5>Portals</h5>
                    <small class="pull-right"><div class="input-group">
                     
                    </div></small>
                </div>
                <div class="ibox-content ">
                    <div class='row'>
                        <div class='col-md-12'>
                            <input type="text" class="form-control form-control-sm" id="Search"
                            onkeyup="myFunction()" placeholder="Search Here" aria-label="search"
                            aria-describedby="search">
                            <br>
                        </div>
                    </div>
                    
                    <div class='row'>
                        <div class='bulletin_files'>
                        @foreach($portals as $key => $portal)
                            <div class='col-sm-3 target text-center'>
                                <a href='{{$portal->link}}' target='_blank'>
                                <div class="m-b-sm">
                                    <img alt="image" class="img-fluid " style='height:50px;' src="{{URL::asset($portal->image)}}">
                                </div>
                                <p class="font-bold">{{$portal->title}}</p>
                                </a>
                            </div>
                        
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='col-md-8'>
                    <div class="ibox-title">
                        <h5><b>Whats new?</b> </h5>
                    </div>
                    <div class="ibox-content">
                        <div class='text-center'>
                            <strong class='text-center'><small><i>No Announcements</i></small></strong>
                        </div>
{{-- 
                        <div class="social-feed-box">
                            <div class="social-avatar">
                                <a href="" class="pull-left">
                                    <img alt="image" src="img/a6.jpg" onerror="this.src='{{URL::asset('/images/no_image.png')}}';">
                                </a>
                                <div class="media-body">
                                    <a href="#">
                                       Renz Christian Cabato
                                    </a>
                                    <small class="text-muted">{{date('m.d.Y h:i a')}}</small>
                                </div>
                            </div>
                            <div class="social-body">
                                <p>
                                    Many desktop publishing packages and web page editors now use Lorem Ipsum as their
                                    default model text, and a search for 'lorem ipsum' will uncover many web sites still
                                    in their infancy. Packages and web page editors now use Lorem Ipsum as their
                                    default model text.
                                </p>
                                <p>
                                    Lorem Ipsum as their
                                    default model text, and a search for 'lorem ipsum' will uncover many web sites still
                                    in their infancy. Packages and web page editors now use Lorem Ipsum as their
                                    default model text.
                                </p>
                                <img src="img/gallery/11.jpg" class="img-responsive">
                            </div>

                        </div> --}}
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><b>HR Boardcast</b> <small>(bulletin)</small></h5>
                        </div>
                        <div class="ibox-content">
                            <div class="row">
                                @foreach($bulletins as $bulletin)
                                <div class='col-md-2 border'>
                                    <a href="#"  data-target="#bulletins{{$bulletin->id}}" data-toggle="modal" data-gallery=""><img style='height:30px;' src="{{asset($bulletin->image)}}"></a>
                                </div>
                                @include('view_bulletin')
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5><b>Upcomming Events</b></h5>
                        </div>
                        <div class="ibox-content">
                            <div class="feed-activity-list">

                                {{-- <div class="feed-element">
                                    <a href=#" class="pull-left">
                                        <img alt="image" class="img-rounded img-sm" src="{{asset('img/profile.jpg')}}">
                                    </a>
                                    <div class="media-body ">
                                        <small class="pull-right">{{date('M. d')}}</small>
                                        <strong>Christmas Party</strong><br>
                                        <small class="text-muted"> 10:10 AM</small><br>
    
                                    </div>
                                </div> --}}
                                
                                <div class='text-center'>
                                    <strong class='text-center'><small><i>No Upcomming Events</i></small></strong>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
        
         
           
        </div>
       
    
    </div>
</div>
@include('public_forms')
@endsection
@section('footer')
  <!-- Custom js for this page-->
  <script src="{{ asset('inside/login_css/js/plugins/dataTables/datatables.min.js')}}"></script>
  <script src="{{ asset('inside/login_css/js/plugins/chosen/chosen.jquery.js') }}"></script>
  <script src="{{ asset('inside/login_css/js/plugins/blueimp/jquery.blueimp-gallery.min.js') }}"></script>
  <script>
      $(document).ready(function(){
          
  
          $('.cat').chosen({width: "100%"});
          $('.tables').DataTable({
              pageLength: 10,
              responsive: true,
                bInfo : false,
              dom: '<"html5buttons"B>lTfgitp',
              buttons: [
                  
              ]
  
          });
  
      });
  
  </script>

@endsection
