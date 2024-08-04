<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class imageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $image = Image::all();
        return view('adminpanel.gallery.adgallery', compact('image'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("adminpanel.gallery.addphotos");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "description" => "required",
            "category" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif|max:2048", // Validating the image upload
        ]);
        if ($request->hasFile("image")) {
            // Store the uploaded image and get its path
            $imagePath = $request->file('image')->storePublicly('images', 'public');
            $image = new Image();
            $image->file_path = $imagePath;
            $image->name = $data["name"];
            $image->description = $data["description"];
            $image->category = $data["category"];
            $image->save();
            // Redirect to the gallery page after successful upload
            return redirect()->route("adminpanel.adgallery")->with('success', 'Image uploaded successfully.');
        } else {
            // Handle the case where file upload fails
            return back()->with('error', 'File upload failed.');
        }
    }

    /**
     * Display the specified 'resource'.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $image = Image::findOrFail($id);
        return view('adminpanel.gallery.editgallery', compact("image"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = Image::findOrFail($id);
        $data = $request->validate([
            "name" => "required",
            "description" => "required",
            "category" => "required"
        ]);
        Image::where("id", $id)->update($data);
        return redirect()->route("adminpanel.adgallery");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image = Image::findOrFail($id);
        if ($image->file_path && Storage::disk('public')->exists($image->file_path)) {
            Storage::disk('public')->delete($image->file_path);
            $image->file_path = null; 
        }
        Image::destroy($id);
        return redirect()->route("adminpanel.adgallery");



    }

}
