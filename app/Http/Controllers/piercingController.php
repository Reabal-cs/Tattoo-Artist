<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\piercing_sec;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class piercingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pierc = piercing_sec::all();
        return view('adminpanel.piercing.piercing', compact('pierc'));

    }







    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("adminpanel.piercing.piercingadd");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "price" => "required",
            "category" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif|max:2048", // Validating the image upload
        ]);

        if ($request->hasFile("image")) { // Check if the request has the correct file field name
            // Store the uploaded image and get its path
            $imagePath = $request->file('image')->store('piercing', 'public'); // Store the image in 'piercing' folder in 'public' disk
            $piercing_sec = new piercing_sec();
            $piercing_sec->image = $imagePath;
            $piercing_sec->name = $data["name"];
            $piercing_sec->price = $data["price"];
            $piercing_sec->category = $data["category"];
            $piercing_sec->save();
            // Redirect to the gallery page after successful upload
            return redirect()->route("piercing_sec")->with('success', 'Image uploaded successfully.');
        } else {
            // Handle the case where file upload fails
            return back()->with('error', 'File upload failed.');
        }
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
        $data = piercing_sec::findOrFail($id);
        return view('adminpanel.piercing.piercingedit', compact("data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = piercing_sec::findOrFail($id);
        $data = $request->validate([
            "name" => "required",
            "category" => "required",
            "price" => "required"
        ]);
        piercing_sec::where("id", $id)->update($data);
        return redirect()->route("piercing_sec");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = piercing_sec::findOrFail($id);
        if ($image->image && Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
            $image->image = null; 
        }
        piercing_sec::destroy($id);
        return redirect()->route("piercing_sec");
    }
}
