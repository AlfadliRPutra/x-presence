<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InternProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function edit()
    {
        //

        $nik = Auth::user()->nik;
        $intern = DB::table('users')->where('nik', $nik)->first();
        return view('intern.profil-edit', compact('intern'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Retrieve the authenticated user's information
        $user = Auth::user();
        if (!$user) {
            return Redirect::back()->with('error', 'User not found.');
        }

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'no_hp' => 'required|string|max:15',
            'password' => 'nullable|string|min:8',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        // Prepare data for updating
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = date('Y-m-d') . '_' . $foto->getClientOriginalName();
            $path = 'photo-user/' . $filename;
            Storage::disk('public')->put($path, file_get_contents($foto));
            $data['foto'] = $filename; // Save the path to the database
        }

        // Debugging purpose
        // ddd($request->all());

        // Update the user's data
        $update = DB::table('users')->where('nik', $user->nik)->update($data);

        // Check if the update was successful
        if ($update) {
            return Redirect::back()->with(['success' => 'Data successfully updated.']);
        } else {
            return Redirect::back()->with(['error' => 'Data failed to update.']);
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
