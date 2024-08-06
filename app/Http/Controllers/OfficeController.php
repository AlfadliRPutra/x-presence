<?php

namespace App\Http\Controllers;

use App\Models\OfficeSite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Using Eloquent to fetch the first record in the office table
        $loc_office = OfficeSite::first();

        // Passing the data to the view
        return view('admin.office', compact('loc_office'));
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'location_office' => 'required|max:100',
            'radius' => 'required|max:10000',
        ]);

        // Create a new instance of the OfficeSite model
        $office = new OfficeSite();
        $office->location_office = $validatedData['location_office'];
        $office->radius = $validatedData['radius'];
        $office->save();

        // Optionally, remove or comment out the debug statement after testing
        // dd($office);

        // Redirect back with a success message
        return Redirect::back()->with('success', 'Office data successfully saved.');
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
    public function edit()
    {
        //
        $loc_office = OfficeSite::first();

        // Passing the data to the view
        return view('admin.office-atur', compact('loc_office'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        // Validate the incoming request data
        $validatedData = $request->validate([
            'location_office' => 'required|max:100',
            'radius' => 'required|max:10000',
        ]);

        // Retrieve the specific record by ID and update the attributes
        $office = OfficeSite::find(1); // Replace '1' with the actual ID if needed

        if ($office) {
            $office->location_office = $validatedData['location_office'];
            $office->radius = $validatedData['radius'];
            $office->save();

            return Redirect::back()->with('success', 'Data successfully updated.');
        } else {
            return Redirect::back()->with('warning', 'Data failed to update.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}