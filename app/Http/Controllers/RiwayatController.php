<?php

namespace App\Http\Controllers;

use App\Models\KendaraanModel;
use App\Models\RiwayatModel;
use App\Models\User;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraan = KendaraanModel::all();
        $driver = User::where('role', 'driver')->get();

        $data = RiwayatModel::with(['driver', 'kendaraan'])->get();

        return view('dashboard.riwayat.riwayat', compact('kendaraan', 'driver', 'data'));
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
        try {
            RiwayatModel::create([
                'kendaraan_id' => $request->input('kendaraan_id'),
                'tanggal_mulai' => $request->input('tanggal_mulai'),
                'tanggal_selesai' => $request->input('tanggal_selesai'),
                'keperluan' => $request->input('keperluan'),
                'lokasi_asal' => $request->input('lokasi_asal'),
                'lokasi_tujuan' => $request->input('lokasi_tujuan'),
                'jarak_tempuh' => $request->input('jarak_tempuh'),
                'driver_id' => $request->input('driver_id'),
            ]);

            return redirect('/riwayat');
        } catch (\Exception $e) {
            return response()->json($e);
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
        try {

            RiwayatModel::find($id)->update([
               'kendaraan_id' => $request->input('kendaraan_id'),
                'tanggal_mulai' => $request->input('tanggal_mulai'),
                'tanggal_selesai' => $request->input('tanggal_selesai'),
                'keperluan' => $request->input('keperluan'),
                'lokasi_asal' => $request->input('lokasi_asal'),
                'lokasi_tujuan' => $request->input('lokasi_tujuan'),
                'jarak_tempuh' => $request->input('jarak_tempuh'),
                'driver_id' => $request->input('driver_id'),
            ]);

            return redirect('/riwayat');

        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            RiwayatModel::find($id)->delete();

            return redirect('/riwayat');

        } catch (\Exception $e) {
            return response()->json($e);
        }
    }
}
