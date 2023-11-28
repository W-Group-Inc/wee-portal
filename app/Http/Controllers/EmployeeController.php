<?php

namespace App\Http\Controllers;
use App\MaritalStatus;
use App\Schedule;
use App\Bank;
use App\Level;
use App\Company;
use App\Classification;
use App\EmployeeCompany;
use App\Department;
use App\Employee;
use App\User;
use App\Location;
use RealRashid\SweetAlert\Facades\Alert;
use App\Project;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    //
    public function index ()
    {   
        
        $schedules = Schedule::get();
        $banks = Bank::get();
        $departments = Department::get();
        $levels = Level::get();
        $marital_statuses = MaritalStatus::get();
        $locations = Location::orderBy('location','ASC')->get();
        $projects = Project::get();
        $classifications = Classification::get();
            
        $companies = Company::orderBy('company_name','ASC')
                                    ->get();
        return view('register_employee',
        array(
            'header' => 'employees',
            'classifications' => $classifications,
            'marital_statuses' => $marital_statuses,
            'departments' => $departments,
            'locations' => $locations,
            'projects' => $projects,
            'levels' => $levels,
            'banks' => $banks,
            'schedules' => $schedules,
            'companies' => $companies,
        )
        );
    }
    public function new(Request $request)
    {
        // dd($request->all());

        $validate_employee = Employee::where('first_name',$request->first_name)
                                        ->where('last_name',$request->last_name)
                                        ->where('company_id',$request->company)
                                        ->first();

        $validate_user = User::where('email',$request->work_email)->first();

        if(empty($validate_employee) && empty($validate_user)){

            $company = Company::findOrfail($request->company);
            // dd($company);
            $user = new User;
            $user->email = $request->work_email;
            $user->name = $request->first_name . " " . $request->last_name;
            $password = strtolower($request->first_name) . '.'. strtolower($request->last_name);
            $stripped_password = str_replace(' ', '', $password);
            $user->password = bcrypt($request->password);
            $user->status = "Active";
            $user->save();

            // $employee_code = $this->generate_emp_code('Employee', $company->company_code, date('Y',strtotime($request->date_hired)), $company->id);
            // $employee_number = $this->generate_biometric_code(date('Y',strtotime($request->date_hired)), $company->id ,$user->id);
            $employee_number = $request->biometric_code;
            $employee_code = $request->employee_code;

            $employee = new Employee;
            $employee->employee_number = $employee_number;
            $employee->employee_code = $employee_code;
            $employee->user_id = $user->id;
            $employee->first_name = $request->first_name;
            $employee->middle_name = $request->middle_name;
            $employee->last_name = $request->last_name;
            $employee->classification = $request->classification;
            $employee->department_id = $request->department;
            $employee->company_id = $request->company;
            $employee->location = $request->location;
            $employee->project = $request->project;
            $employee->position = $request->position;
            $employee->nick_name = $request->nickname;
            $employee->level = $request->level;
            $employee->gender = $request->gender;
            $employee->obanana_date_hired = $request->date_hired;
            $employee->birth_date = $request->birthdate;
            $employee->birth_place = $request->birthplace;
            $employee->marital_status = $request->marital_status;
            $employee->status = "Active";
            $employee->present_address = $request->present_address;
            $employee->permanent_address = ($request->permanent_address == '') ? $request->present_address : $request->permanent_address;
            $employee->personal_number = $request->personal_number;
            $employee->phil_number = $request->philhealth;
            $employee->sss_number = $request->sss;
            $employee->tax_number = $request->tin;
            $employee->hdmf_number = $request->pagibig;
            $employee->original_date_hired = $request->date_hired;
            $employee->personal_email = $request->personal_email;
            $employee->immediate_sup = $request->immediate_supervisor;
            $employee->schedule_id = $request->schedule;
            $employee->middle_initial = $request->middile_initial;
            $employee->name_suffix = $request->suffix;
            $employee->religion = $request->religion;
            
            $employee->bank_name = $request->bank_name;
            $employee->bank_account_number = $request->bank_account_number;

            $employee->location = $request->location;
            $employee->work_description = $request->work_description;
            $employee->rate = isset($request->rate) ? Crypt::encryptString($request->rate) : "";
            $employee->tax_application = $request->tax_application;

            $employee->is_new_employee = 1;

            if($request->hasFile('file'))
            {
                $attachment = $request->file('file');
                $original_name = $attachment->getClientOriginalName();
                $name = time().'_'.$attachment->getClientOriginalName();
                $attachment->move(public_path().'/avatar/', $name);
                $file_name = '/avatar/'.$name;
                $employee->avatar = $file_name;
            }

            if($request->hasFile('signature'))
            {
                $attachment = $request->file('signature');
                $original_name = $attachment->getClientOriginalName();
                $name = time().'_'.$attachment->getClientOriginalName();
                $attachment->move(public_path().'/signature/', $name);
                $file_name = '/signature/'.$name;
                $employee->signature = $file_name;
            }

            $employee->save();

            $employeeCompany = new EmployeeCompany;
            $employeeCompany->emp_code = $request->biometric_code;
            $employeeCompany->schedule_id = 1;
            $employeeCompany->company_id = $request->company;
            
            $employeeCompany->save();

            if(isset($request->approver)){

                $count_approver = count($request->approver);
                $level = 1;
                if(count($request->approver) > 0){
                    foreach($request->approver as $k =>  $approver_item)
                    {
                        $new_approver = new EmployeeApprover;
                        
                        if($count_approver == 1 && $k == 0){
                            $new_approver->as_final = "on";
                        }
    
                        if($count_approver == 2 && $k == 1){
                            $new_approver->as_final = "on";
                        }
    
                        $new_approver->user_id = $employee->user_id;
                        $new_approver->approver_id = $approver_item['approver_id'];
                        $new_approver->level = $level;
                        
                        $new_approver->save();
                        $level = $level+1;
                    }
                }
            }

            Alert::success('Successfully Registered')->persistent('Dismiss');
            return redirect('/login');
        }else{
            Alert::warning('Warning : Employee Exist!')->persistent('Dismiss');
            return redirect('register-employee');
        }
    }

}
