<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\Image;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class admin extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $test = Testimonial::all();

        return view('adminpanel.Testimonials.edittestimonials', compact('test'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        User::findOrFail($id);
        User::destroy($id);
        return redirect()->route("user");
    }

    public function resAction(Request $request, string $id)
    {
        $app = appointment::findOrFail($id);

        if (request("status") == "confirm") {
            $app->status = "Confirmed";
            $app->save();
            return back();
        }
        if (request("status") == "reject") {
            $app->status = "Rejected";
            $app->save();
            return back();
        }
        return back();
    }

    public function adminink()
    {
        return view('adminpanel.inkbrands');
    }
    public function home()
    {
        $users = User::all();

        return view('adminpanel.user', compact("users"));
    }
    public function adminusers()
    {
        $users = User::all();

        return view('adminpanel.user', compact("users"));
    }
    public function udestroy(Request $request, $id)
    {
        $image = Testimonial::findOrFail($id);
        if ($image->image && Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
            $image->image = null;
        }
        Testimonial::destroy($id);
        return redirect()->route("adtestimonial.index");
    }

}