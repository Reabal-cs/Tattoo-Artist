<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\appointment;
use PhpParser\Builder\Function_;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
    public function index()
    {
        $data = appointment::all();
        return view('adminpanel.appointments', compact('data'));
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
        $data = $request->validate([
            "name" => "required",
            "phone" => "required|integer",
            "service" => "required", 
            "nationality" => "required", 
            "gender" => "required", 
            "date" => "required|date", // Add date validation
            "comment" => "required"
        ]);
    
        $user_id = Auth::user()->id; // Get the id of the currently authenticated user
        $appointment = new Appointment();
        $appointment->name = $data["name"];
        $appointment->phone = $data["phone"];
        $appointment->service = $data["service"];
        $appointment->nationality = $data["nationality"];
        $appointment->gender = $data["gender"];
        $appointment->date = $data["date"]; // Add date to the appointment
        $appointment->comment = $data["comment"];
        $appointment->user_id = $user_id; // Set the user_id
        $appointment->save();
    
        // Redirect to the reservation page after successful upload
        return redirect()->route("reservation")->with('success', 'Appointment booked successfully');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(appointment $appointment)
    {
        $data = appointment::findOrFail($appointment);
        return view('adminpanel.appointments', compact("data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, appointment $id)
    {   
        
        $appointments = appointment::findOrFail($id);
        $appointments->status = $request->status;
        appointment::where("id", $id)->update($appointments);
        $appointments->save();
        return redirect()->route('reservation.edit')->with('success', 'Appointment status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        appointment::findOrFail($id);
        appointment::destroy($id);
        return redirect()->route("reservation.index");
    
       
    }
  
}
