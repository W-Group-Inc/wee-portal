<?php

namespace App\Http\Controllers;
use App\Bulletin;
use Illuminate\Http\Request;

use RealRashid\SweetAlert\Facades\Alert;
class BulletinController extends Controller
{
    //

    public function index()
    {
        $bulletins = Bulletin::get();

        return view('bulletins',
        array(
            'bulletins' => $bulletins,
        )
    
        );
    }
    public function store(Request $request)
    {
        $request->validate([ 
            'image' => 'required|image|max:2048',                 
    ]);
    $attachment = $request->file('image');
    $original_name = $attachment->getClientOriginalName();
    $name = time().'_'.$attachment->getClientOriginalName();
    $attachment->move(public_path().'/bulletin_images/', $name);
    $file_name = '/bulletin_images/'.$name;
    $bulletin = new Bulletin;
    $bulletin->title = $request->title;
    $bulletin->image = $file_name;
    $bulletin->user_id = auth()->user()->id;
    $bulletin->date_expired = $request->date_expired;
    $bulletin->save();
    
    Alert::success('Successfully save.')->persistent('Dismiss');
    return back();
    }
}
