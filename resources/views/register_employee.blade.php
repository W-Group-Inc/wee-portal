<!-- Modal -->
@extends('layouts.register_head')
@section('content')
    <div class="row">
        <div class="col-md-12 mx-0">
            <form id="msform" class='text-center' method='post' onsubmit='show()' action='{{url('/new-employee')}}' enctype="multipart/form-data">
            {{ csrf_field() }}
                <!-- progressbar -->
                <ul id="progressbar">
                    <li class="active user" id="account" class=''><strong>Personal</strong></li>
                    <li class='employment'><strong>Employment</strong></li>
                    <li id="payment"><strong>Government</strong></li>
                    <li id="confirm"><strong>Gallery</strong></li>
                </ul>
                <fieldset class='text-right' id='personal_information'>
                    <div class="form-card">
                        <h2 class="fs-title">Personal Information</h2>
                        <div class='row mb-2'>
                        <div class='col-md-3'>
                            First Name 
                            <input type="text" name="first_name" class='form-control form-control-sm required' placeholder="First Name" required/>
                        </div>
                        <div class='col-md-3'>
                            Middle Name
                            <input type="text" name="middle_name" class='form-control form-control-sm ' placeholder="Middle Name"/>
                        </div>
                        <div class='col-md-2'>
                            Middle Initial
                            <input type="text" name="middile_initial" class='form-control form-control-sm ' placeholder="Middle Initial"/>
                        </div>
                        <div class='col-md-4'>
                            Last Name
                            <input type="text" name="last_name" class='form-control form-control-sm required' placeholder="Last Name" required/>
                        </div>
                    
                        </div>
                        <div class='row mb-2'>
                        <div class='col-md-3'>
                            Suffix
                            <input type="text" name="suffix" class='form-control form-control-sm ' placeholder="Suffix"/>
                        </div>
                        <div class='col-md-3'>
                            Nickname
                            <input type="text" name="nickname" class='form-control form-control-sm required' placeholder="Nickname" required/>
                        </div>
                        <div class='col-md-2'>
                            Marital Status
                            <select class='form-control required form-control-sm ' name='marital_status' required>
                            <option value=''>--Select Marital Status--</option>
                            @foreach($marital_statuses as $marital_status)
                                <option value='{{$marital_status->name}}'>{{$marital_status->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class='col-md-2'>
                            Religion
                            <input type="text" name="religion" class='form-control form-control-sm required' placeholder="Religion" required>
                        </div>
                        <div class='col-md-2'>
                            Gender
                            <select data-placeholder="Gender" class="form-control form-control-sm required" name='gender' required >
                            <option value="">--Select Gender--</option>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                        </div>
                        </div>
                    
                        <hr>
                        <h2 class="fs-title">Birth Information</h2>
                        <div class="row mb-2">
                        <div class="col-md-3"> 
                            Birth date
                            <input type="date" name="birthdate" class='form-control form-control-sm required' max='{{date('Y-m-d', strtotime('-18 year'))}}' placeholder="BirthDate" required>
                        </div>
                        
                        <div class="col-md-3"> 
                            Birth Place 
                            <input type="text" name="birthplace" class='form-control form-control-sm required'placeholder="Manila" required>
                        </div>
                    </div>
                    <hr>
                    <h2 class="fs-title">Contact Details</h2>
                    <div class='row mb-2'>
                        <div class='col-md-4'>
                        Personal Email
                            <input type="email" name="personal_email" class='form-control form-control-sm' placeholder="Personal Email"/>
                        </div>
                        <div class='col-md-4'>
                        Personal Contact Number
                            <input type="number" name="personal_number" class='form-control form-control-sm required' placeholder="Personal Contact Number" required>
                        </div>
                    </div>
                    <div class='row mb-2'>
                        <div class='col-md-6'>
                        Present Address
                        <input type="text" name="present_address" class='form-control form-control-sm required' placeholder="Present Address" required>
                        </div>
                        <div class='col-md-6'>
                        <input onclick='same_as_current(this.value)' type="checkbox" class="ml-1 form-check-input" id="same_as"> <label class='ml-4 mb-0' for='same_as'><small><i>Same as Current Address</i></small></label>
                        <input type="text" id='permanent_address' name="permanent_address" class='form-control form-control-sm required' placeholder="Permanent Address" required/>
                        </div>
                    </div>
                    <hr>
                    </div>
                    <input type="button" name="next" class="next action-button btn btn-info" value="Next"/>
                </fieldset>
                <fieldset class='text-right' id='employment_information'>
                    <div class="form-card">
                    <h2 class="fs-title">Employment Information</h2>
                    <div class='row mb-2'>
                        <div class='col-md-4'>
                        Company
                        <select data-placeholder="Company" class="form-control form-control-sm required js-example-basic-single " style='width:100%;' name='company' required>
                            <option value="">--Select Company--</option>
                            @foreach($companies as $company)
                            <option value="{{$company->id}}">{{$company->company_name}} - {{$company->company_code}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class='col-md-4'>
                        Position
                        <input type="text" name="position" class='form-control form-control-sm required' placeholder="POSITION"/>
                        </div>
                        <div class='col-md-4'>
                        Department
                        <select data-placeholder="Department" class="form-control form-control-sm js-example-basic-single " style='width:100%;' name='department' required>
                            <option value="">--Select Department--</option>
                            <option value="0">N/A</option>
                            @foreach($departments as $department)
                                <option value="{{$department->id}}">{{$department->code}} - {{$department->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class='col-md-4'>
                        Classification
                        <select data-placeholder="Classification" class="form-control form-control-sm required js-example-basic-single " style='width:100%;' name='classification' required>
                            <option value="">--Select Classification--</option>
                            @foreach($classifications as $classification)
                            <option value="{{$classification->id}}">{{$classification->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class='col-md-4'>
                        Level
                        <select data-placeholder="Level" class="form-control form-control-sm required js-example-basic-single " style='width:100%;' name='level' required>
                            <option value="">--Select Level--</option>
                            @foreach($levels as $level)
                            <option value="{{$level->id}}">{{$level->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class='col-md-4'>
                        Date Hired
                        <input type="date" name="date_hired" class='form-control form-control-sm required' placeholder="Start Date"/>
                        </div>
                        <div class='col-md-4'>
                        Work Email
                        <input type="email" name="work_email" class='form-control form-control-sm required' placeholder="Work Email" required/>
                        </div>
                        <div class='col-md-4'>
                            Employee Code
                            <input type="text" name="employee_code" class='form-control form-control-sm required' placeholder="Employee Code" required/>
                          </div>
                        <div class='col-md-4'>
                            Biometric Code
                            <input type="text" name="biometric_code" class='form-control form-control-sm required' placeholder="BIOMETRIC CODE"/>
                          </div>
                        <div class='col-md-4'>
                        Schedule
                        <select data-placeholder="Schedule Period" class="form-control form-control-sm required js-example-basic-single " style='width:100%;' name='schedule' required>
                            
                            @foreach($schedules as $schedule)
                            <option value="{{$schedule->id}}">{{$schedule->schedule_name}}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class='col-md-4'>
                            New Password
                            <input type="password" name="password" class='form-control form-control-sm required' placeholder="New Password"/>
                          </div>
                    </div>
                    <hr>
                    <hr>
                    </div>
                    <input type="button" name="previous" class="previous action-button-previous btn btn-secondary" value="Previous"/>
                    <input type="button" name="next" class="next action-button btn btn-info" value="Next Step"/>
                </fieldset>
                <fieldset class='text-right' id='government_information'>
                    <div class="form-card">
                      <h2 class="fs-title">Government Information</h2>
                      <div class='row mb-2'>
                        <div class='col-md-3'>
                          SSS
                          <input type='text' name='sss'  data-inputmask-alias="99-9999999-9"  class='form-control form-control-sm required' value=''>
                        </div>
                        <div class='col-md-3'>
                          Philhealth
                          <input type='text' name='philhealth' data-inputmask-alias="9999-9999-9999" class='form-control form-control-sm required' value=''>
                        </div>
                        <div class='col-md-3'>
                          Pagibig
                          <input type='text' name='pagibig' data-inputmask-alias="9999-9999-9999" class='form-control form-control-sm required' value=''>
                        </div>
                        <div class='col-md-3'>
                          TIN
                          <input type='text' name='tin' data-inputmask-alias="999-999-999" class='form-control form-control-sm required' value=''>
                        </div>
                      </div>
                      <hr>
                      {{-- <h2 class="fs-title">Upload Supporting Documents</h2>
                      <div class='row mb-2'>
                        <div class='col-md-12'>
                          <input type='file' name='documents[]' class='form-control form-control-sm' multiple>
                        </div>
                        
                      </div> --}}
                        <hr>
                    </div>
                    <input type="button" name="previous" class="previous action-button-previous btn btn-secondary" value="Previous"/>
                    <input type="button" name="next" class="next action-button btn btn-info" value="Next Step"/>
                </fieldset>
                <fieldset class='text-right' id='images'> 
                    <div class="form-card">
                      <hr>
                      <div class="form-group row">
                        <div class="col-lg-3 align-self-center text-right">
                            <i>(optional)</i><br>
                            <img id='avatar' src="{{URL::asset('/images/no_image.png')}}" class="rounded-circle circle-border m-b-md border" alt="profile" height='125px;' width='125px;'>
                            
                        </div>
                        <div class="col-lg-3 align-self-center text-left">
                          <label title="Upload image file" for="inputImage" class="btn btn-primary btn-sm ">
                              <input type="file" accept="image/*" name="file" id="inputImage" style="display:none"  onchange='uploadimage(this)'>
                              Upload Avatar
                          </label><br>
                          {{-- <label title="Upload image file" for="inputImage" class="btn btn-info btn-sm ">
                              <input type="file" accept="image/*" name="file" id="inputImage" style="display:none"  onchange='captureimage(this)'>
                              Capture Avatar
                          </label> --}}
                          
                        </div>
                        <div class="col-lg-3 text-center">
                            <i>(optional)</i><br>
                          <img id='signature' src="{{URL::asset('/images/signature.png')}}" class="rounded-square circle-border m-b-md border" alt="profile" height='125px;' width='225px;'>
                        </div>
                        <div class="col-lg-3 align-self-center text-left">
                          <label title="Upload signature file" for="inputSignature" class="btn btn-primary btn-sm ">
                              <input type="file" accept="image/*" name="file" id="inputSignature" style="display:none"  onchange='uploadsignature(this)'>
                              Upload Signature
                          </label>
                          <br>
                          {{-- <label title="Upload image file" for="inputImage" class="btn btn-info btn-sm ">
                              <input type="file" accept="image/*" name="file" id="inputImage" style="display:none"  onchange='esign(this)'>
                              Capture Signature
                          </label> --}}
                        </div>

                    </div>
                      <hr>
                    </div>
                    <input type="button" name="previous" class="previous action-button-previous btn btn-secondary" value="Previous"/>
                    <button id='save' type="button" class="btn btn-primary">Save</button>
                </fieldset>
            </form>
        </div>
    </div>
    <script>
        function same_as_current(value)
        {
           var checkbox = document.querySelector('#same_as');
           if(checkbox.checked == true)
           {
            document.getElementById("permanent_address").readOnly = true;
            document.getElementById("permanent_address").required = false;
            document.getElementById("permanent_address").value = "";
            document.getElementById("permanent_address").classList.remove("required");
            document.getElementById("permanent_address").style.border = '1px solid #CED4DA';    
            
      
           }
           else
           {
            document.getElementById("permanent_address").readOnly = false;
            document.getElementById("permanent_address").required = true;
            document.getElementById("permanent_address").value = "";
            document.getElementById("permanent_address").classList.add("required");
           }
         
          
       }
       function uploadimage(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#avatar').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
  function uploadsignature(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#signature').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
       </script>
@endsection


 