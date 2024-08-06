<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Get the authenticated user's nik
        $nik = Auth::user()->nik;

        // Retrieve records from the 'pengajuan_izin' table related to the authenticated user
        $dataizin = User::find($nik)->pengajuanIzin()->get();
        return view('intern.absensi', compact('dataizin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('intern.absensi-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $nik = Auth::user()->nik;
        $date_izin = $request->date_izin;
        $status = $request->status;
        $keterangan = $request->keterangan;

        $status_approved = 0;

        $data = [
            'nik' => $nik,
            'date_izin' => $date_izin,
            'status' => $status,
            'keterangan' => $keterangan,
            'status_approved' => $status_approved, // Menambahkan nilai untuk kolom 'status_approved'
        ];

        $save = DB::table('pengajuan_izin')->insert($data);

        if ($save) {
            return redirect()->route('intern.absensi')->with(['success' => 'Data Berhasil Disimpan']);
        } else {
            return redirect()->route('intern.absensi')->with(['error' => 'Data Gagal Disimpan']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $izinsakit = DB::table('pengajuan_izin')
            ->join('users', 'pengajuan_izin.nik', '=', 'users.nik')
            ->orderBy('date_izin', 'desc')
            ->get();
        return view('admin.absensi', compact('izinsakit'));
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
    public function update(Request $request)
    {
        //
        $status_approved = $request->status_approved;
        $id_izinsakit_form = $request->id_izinsakit_form;
        $update = DB::table('pengajuan_izin')->where('id', $id_izinsakit_form)->update([
            'status_approved' => $status_approved
        ]);
        if ($update) {
            return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function batalIzin($id)
    {
        $update = DB::table('pengajuan_izin')->where('id', $id)->update([
            'status_approved' => 0
        ]);
        if ($update) {
            return Redirect::back()->with(['success' => 'Data Berhasil Diupdate']);
        } else {
            return Redirect::back()->with(['warning' => 'Data Gagal Diupdate']);
        }
    }
}