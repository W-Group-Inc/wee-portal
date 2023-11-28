<?php

namespace App\Http\Controllers;
use App\Http\Controllers\AttendanceController;
use Illuminate\Http\Request;
use App\Portal;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        $portals = Portal::where('status',null)->orderBy('title','asc')->get();
        return view('home',
        array(
            'portals' => $portals,
        )
    );
    }
}
