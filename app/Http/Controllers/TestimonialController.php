<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Testimonial::all();
        return view('testimonial.testimonials', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testimonial.addtestimonials');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "name" => "required",
            "feedback" => "required",
            "image" => "image|mimes:jpeg,png,jpg,gif|max:2048", // Validating the image upload
        ]);

        $user_id = Auth::id(); // Get the ID of the currently authenticated user

        // Store the uploaded image and get its path
        $imagePath = $request->file('image')->storePublicly('testimonials', 'public');

        $testimonial = new Testimonial();
        $testimonial->image = $imagePath;
        $testimonial->name = $data["name"];
        $testimonial->feedback = $data["feedback"];
        $testimonial->user_id = $user_id; // Set the user_id
        $testimonial->save();

        // Redirect to the gallery page after successful upload
        return redirect()->route("testimonial.index");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Check if the authenticated user is the owner of the testimonial
        if ($testimonial->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('testimonial.edittestimonial', compact("testimonial"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Check if the authenticated user is the owner of the testimonial
        if ($testimonial->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $data = $request->validate([
            "name" => "required",
            "feedback" => "required",
        ]);

        $testimonial->update($data);
        return redirect()->route("testimonial.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        // Check if the authenticated user is the owner of the testimonial
        if ($testimonial->user_id != Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $testimonial->delete();
        return redirect()->route("testimonial.index");
    }
}
