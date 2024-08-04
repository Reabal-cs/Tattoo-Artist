<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\appointment;
use App\Models\inkbrand;
use App\Models\Image;
use App\Models\piercing_sec;
use Illuminate\Http\Request;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','verified'])->except(["gallery", "inkbrand","home","testimonials"]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function reservation(Request $request)
    {
       $data=appointment::all();
        return view('reservation', compact("data"));
    }
    public function contact()
    {
        return view('calculator');
    }
    public function piercingsec()
    {
        $pierc = piercing_sec::all();
        return view('piercingsec', compact('pierc'));
    }
   

    public function gallery()
    {
        $images = Image::all();
        return view('gallery', compact('images'));
    }

    public function inkbrand()
    {
        $ink = inkbrand::all();
        return view('inkbrand', compact('ink'));
    }


public function home(){
return view('home');
}

}
