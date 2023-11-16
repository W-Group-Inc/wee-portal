<?php

namespace App\Http\Controllers;
use App\Portal;
use App\ScheduleData;
use App\Employee;
use App\Bulletin;
use App\Document;
use Illuminate\Http\Request;

use App\Http\Controllers\AttendanceController;
use RealRashid\SweetAlert\Facades\Alert;
class PortalController extends Controller
{
    //

    public function index()
    {
        $json = json_decode(file_get_contents("https://edms.wsystem.online/api/get-public-documents"), true);
        $employees_new_hire = Employee::where('original_date_hired',">=",date("Y-m-d", strtotime("-1 months")))->orderBy('original_date_hired','desc')->get();
        $employee_birthday_celebrants = Employee::whereMonth('birth_date',date('m'))->orderBy('birth_date','asc')->get();
        $documents = Document::get();
        $attendance_controller = new AttendanceController;
        $attendance_now = $attendance_controller->get_attendances(date('Y-m-d'),date('Y-m-d'),auth()->user()->biometrics_code)->first();
        $schedules = ScheduleData::where('schedule_id',auth()->user()->schedule)->get();
        $portals = Portal::where('status',null)->orderBy('title','asc')->get();
        $bulletins = Bulletin::get();
        return view('home',
        array(
            'portals' => $portals,
            'attendance_now' => $attendance_now,
            'schedules' => $schedules,
            'public_forms' => $json,
            'documents' => $documents,
            'employees' => $employees_new_hire,
            'bulletins' => $bulletins,
            'employee_birthday_celebrants' => $employee_birthday_celebrants,
        ));
    }

    public function show ()
    {
        $portals = Portal::get();
        return view('show',
        array(
            'portals' => $portals,
            'header' => "Portal",

        ));
    }

    public function new_portal(Request $request)
    {
        $request->validate([ 
                'image' => 'required|image|max:2048',                 
        ]);
        $attachment = $request->file('image');
        $original_name = $attachment->getClientOriginalName();
        $name = time().'_'.$attachment->getClientOriginalName();
        $attachment->move(public_path().'/portal_images/', $name);
        $file_name = '/portal_images/'.$name;
        $portal = new Portal;
        $portal->title = $request->title;
        $portal->link = $request->link;
        $portal->outside_link = $request->link_outside;
        $portal->image = $file_name;
        $portal->save();
        
        Alert::success('Successfully save.')->persistent('Dismiss');
        return back();
    }

    public function deactivate_portal(Request $request, $id)
    {
        $portal = Portal::findOrfail($id);
        $portal->status = "Inactive";
        $portal->save();
        Alert::success('Successfully Deactivated.')->persistent('Dismiss');
        return back();
    }
    public function activate_portal(Request $request, $id)
    {
        $portal = Portal::findOrfail($id);
        $portal->status = null;
        $portal->save();
        Alert::success('Successfully Activated.')->persistent('Dismiss');
        return back();
    }
}
