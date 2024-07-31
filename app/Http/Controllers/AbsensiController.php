<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $nik = Auth::user()->nik;
        $dataizin = DB::table('pengajuan_izin')->where('nik', $nik)->get();
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

        // Menambahkan nilai default untuk kolom 'status_approved'
        $status_approved = 0; // atau sesuai dengan kebutuhan Anda

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
    public function destroy(string $id)
    {
        //
    }
}
