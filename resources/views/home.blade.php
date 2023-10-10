@extends('layouts.header')
@section('css')

<link href="{{asset('inside/login_css/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet')}}">
<link href="{{asset('inside/login_css/css/plugins/fullcalendar/fullcalendar.css')}}" rel="stylesheet">
<link href="{{asset('inside/login_css/css/plugins/fullcalendar/fullcalendar.print.css')}}" rel='stylesheet' media='print'>
@endsection
@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-2">
            <div class="ibox">
                <div class="ibox-content">
                    <div>
                        <img src="{{asset('img/a4.jpg')}}" class="img-circle img-sm circle-border" style='width:50px;height:50px;vertical-align:middle;' alt="profile">
                       
                        <b><span style="">Alex Smith</span></b>
                      </div>
                      <h6><i class="fa fa-envelope"></i> renz.cabato@wgroup.com.ph <br></h6>
                      <h6><i class="fa fa-window-maximize"></i> Information Technology Department <br></h6>
                        <h6><i class="fa fa-briefcase"></i> System Development Head<br></h6>
                </div>
            </div>
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Welcome to </h5><label class='label label-success'>W Group Inc.</label>
                </div>
                <div class="ibox-content">
                    <ul class="list-unstyled file-list">
                        <li><a href=""><i class="fa fa-file"></i> Employee Handbook</a></li>
                        <li><a href=""><i class="fa fa-file"></i> Code of Conduct</a></li>
                        <li><a href=""><i class="fa fa-file"></i> Empleyado User Manual</a></li>
                        <li><a href=""><i class="fa fa-file"></i> Empleyado Approver Manual</a></li>
                        <li><a href=""><i class="fa fa-file"></i> Employee Orientation</a></li>
                    </ul>
                </div>
            </div>
            <div class="ibox">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="file-manager">
                            <h5>Public Forms </h5>
                            <ul class="folder-list" style="padding: 0">
                                <li><a href=""><i class="fa fa-folder"></i> ACC</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> APD</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> BCD</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> BMO</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> BPD</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> FMD</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> HRD</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> IAD</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> OTC</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> PRD</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> SQA</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> TMD</a></li>
                                <li><a href=""><i class="fa fa-folder"></i> TRD</a></li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            
         
           
        </div>
        <div class="col-md-2">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{date('M. d, Y')}} <i class="fa fa-clock-o icon-md text-info d-flex align-self-center mr-3"></i></h5> 
                    <div class="ibox-tools">
                        <span id='span' class="label label-warning-light pull-right"></span>
                    </div>
                </div>
                <div class="ibox-content">
                    
                    <div class="card-body">
                        <h3 class="card-title">
                            </h3>
                        <div class="media">
                            
                            <div class="media-body">
                                <p class="card-text">Time In : 
                                    NO TIME IN 
                                    </p>
                                
                            </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Portals</h5>
                </div>
                <div class="ibox-content text-center">
                    <input  placeholder="Search ..." class="form-control">
                    <hr>
                    <div class='row'>
                        <div class='col-md-4'>
                            <div class="m-b-sm">
                                <img alt="image" class="img-circle " style='width:100%;' src="{{asset('/img/123.PNG')}}">
                            </div>
                            <p class="font-bold">EDMS</p>
                        </div>
                        <div class='col-md-4'>
                            <div class="m-b-sm">
                                <img alt="image" class="img-circle" style='width:100%;'   src="{{asset('/img/123.PNG')}}">
                            </div>
                            <p class="font-bold">NetSuite</p>
                        </div>
                        <div class='col-md-4'>
                            <div class="m-b-sm">
                                <img alt="image" class="img-circle" style='width:100%;'  src="{{asset('/img/123.PNG')}}">
                            </div>
                            <p class="font-bold">SAP</p>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Bulletin & Memos</h5>
                </div>
                <div class="ibox-content">

                    <div class="lightBoxGallery">
                        <a href="{{asset('img/gallery/1.jpg')}}" title="Image from Unsplash" data-gallery="" ><img style='width:50px;' src="img/gallery/1s.jpg"></a>
                        <a href="{{asset('img/gallery/2.jpg')}}" title="Image from Unsplash" data-gallery=""><img style='width:50px;' src="img/gallery/2s.jpg"></a>
                        <a href="{{asset('img/gallery/2.jpg')}}" title="Image from Unsplash" data-gallery=""><img style='width:50px;' src="img/gallery/2s.jpg"></a>
                        <a href="{{asset('img/gallery/2.jpg')}}" title="Image from Unsplash" data-gallery=""><img style='width:50px;' src="img/gallery/2s.jpg"></a>
                        <a href="{{asset('img/gallery/2.jpg')}}" title="Image from Unsplash" data-gallery=""><img style='width:50px;' src="img/gallery/2s.jpg"></a>
                        <a href="{{asset('img/gallery/2.jpg')}}" title="Image from Unsplash" data-gallery=""><img style='width:50px;' src="img/gallery/2s.jpg"></a>
                        <a href="{{asset('img/gallery/2.jpg')}}" title="Image from Unsplash" data-gallery=""><img style='width:50px;' src="img/gallery/2s.jpg"></a>

                        
                    </div>

                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Welcome new Hires</h5>
                    <div class="ibox-tools">
                        <span class="label label-warning-light pull-right">{{date('F Y')}}</span>
                        </div>
                </div>
                <div class="ibox-content">

                    <div>
                        <div class="feed-activity-list">

                            <div class="feed-element">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle img-sm" src="{{asset('img/profile.jpg')}}">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">Position <br>
                                    {{date('M. d')}}</small>
                                    <strong>Monica Smith</strong><br>
                                    <small class="text-muted">W Group Inc.</small>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Birthday Celebrants</h5>
                    <div class="ibox-tools">
                        <span class="label label-warning-light pull-right">{{date('F Y')}}</span>
                        </div>
                </div>
                <div class="ibox-content">
                    <div>
                        <div class="feed-activity-list">

                            <div class="feed-element">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">{{date('M. d')}}</small>
                                    <strong>Monica Smith</strong><br>
                                    <small class="text-muted">W Group Inc.</small>

                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    
    </div>
</div>
<script>
  var span = document.getElementById('span');

  function time() {
  var d = new Date();
  var s = d.getSeconds();
  var m = d.getMinutes();
  var h = d.getHours();
  span.textContent = 
      ("0" + h).substr(-2) + ":" + ("0" + m).substr(-2) + ":" + ("0" + s).substr(-2);
  }

  setInterval(time, 1000);
</script>
<script src="{{asset('inside/login_css/js/plugins/fullcalendar/moment.min.js')}}"></script>
@endsection
@section('footer')
<script src="{{asset('inside/login_css/js/plugins/fullcalendar/fullcalendar.min.js')}}"></script>


<script>

    $(document).ready(function() {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar
            drop: function() {
                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
            events: [
                {
                    title: 'All Day Event',
                    start: new Date(y, m, 1)
                },
                {
                    title: 'Long Event',
                    start: new Date(y, m, d-5),
                    end: new Date(y, m, d-2)
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d-3, 16, 0),
                    allDay: false
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: new Date(y, m, d+4, 16, 0),
                    allDay: false
                },
                {
                    title: 'Meeting',
                    start: new Date(y, m, d, 10, 30),
                    allDay: false
                },
                {
                    title: 'Lunch',
                    start: new Date(y, m, d, 12, 0),
                    end: new Date(y, m, d, 14, 0),
                    allDay: false
                },
                {
                    title: 'Birthday Party',
                    start: new Date(y, m, d+1, 19, 0),
                    end: new Date(y, m, d+1, 22, 30),
                    allDay: false
                },
                {
                    title: 'Click for Google',
                    start: new Date(y, m, 28),
                    end: new Date(y, m, 29),
                    url: 'http://google.com/'
                }
            ]
        });
    });

</script>
@endsection
