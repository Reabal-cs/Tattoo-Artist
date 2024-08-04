<?php

namespace App\Http\Controllers;

use App\Models\inkbrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class inkbrands extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        
        $inkbrand = inkbrand::all();
        return view('adminpanel.inkbrands.inkbrands', compact('inkbrand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminpanel.inkbrands.addbrands');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif|max:2048", // Corrected validation for the image field
            "quality" => "required",
            "price" => "required|numeric", // Example validation for price
        ]);
    
        if ($request->hasFile("image")) { // Check if the file exists in the request
            $imagePath = $request->file('image')->storePublicly('inkbrands', 'public');
            $inkbrand = new Inkbrand();
            $inkbrand->image = $imagePath;
            $inkbrand->name = $data["name"];
            $inkbrand->quality = $data["quality"];
            $inkbrand->price = $data["price"];
            $inkbrand->save();
            return redirect()->route("inkbrands.index");
        } else {
            // Handle the case where file upload fails
            return back()->with('error', 'File upload failed.');
        }
    }
    
    
    public function destroy(string $id)
    {
        $image = inkbrand::findOrFail($id);
        if ($image->image && Storage::disk('public')->exists($image->image)) {
            Storage::disk('public')->delete($image->image);
            $image->image = null; 
        }
        inkbrand::destroy($id);
        return redirect()->route("inkbrands.index");
    }
}
