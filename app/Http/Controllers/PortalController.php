<?php

namespace App\Http\Controllers;
use App\Portal;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
class PortalController extends Controller
{
    //

    public function index()
    {
        $portals = Portal::where('status',null)->orderBy('title','asc')->get();
        return view('home',
        array(
            'portals' => $portals,
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
