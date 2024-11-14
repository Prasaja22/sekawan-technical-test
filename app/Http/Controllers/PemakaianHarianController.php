<?php

namespace App\Http\Controllers;

use App\Models\KendaraanModel;
use App\Models\PemakaianHarianModel;
use App\Models\User;
use Illuminate\Http\Request;

class PemakaianHarianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $kendaraan = KendaraanModel::all();
        $driver = User::where('role', 'driver')->get();

        $data = PemakaianHarianModel::with(['driver', 'kendaraan'])->get();

        return view('dashboard.pemakaian.pemakaian', compact('kendaraan', 'driver', 'data'));
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
            // Validasi apakah driver_id ada di tabel users dan memiliki role driver
            $driver = User::find($request->input('driver_id'));

            if (!$driver || $driver->role != 'driver') {
                return response()->json(['error' => 'Driver not found or not valid.'], 400);
            }

            // Create the PemakaianHarian record
            PemakaianHarianModel::create([
                'tanggal' => $request->input('tanggal'),
                'kendaraan_id' => $request->input('kendaraan_id'),
                'jarak_tempuh_harian' => $request->input('jarak_tempuh_harian'),
                'bahan_bakar_digunakan' => $request->input('bahan_bakar_digunakan'),
                'driver_id' => $request->input('driver_id'),
            ]);

            return redirect('/pemakaian');
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

            PemakaianHarianModel::find($id)->update([
                'tanggal' => $request->input('tanggal'),
                'kendaraan_id' => $request->input('kendaraan_id'),
                'jarak_tempuh_harian' => $request->input('jarak_tempuh_harian'),
                'bahan_bakar_digunakan' => $request->input('bahan_bakar_digunakan'),
                'driver_id' => $request->input('driver_id'),
            ]);

            return redirect('/pemakaian');

        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            PemakaianHarianModel::find($id)->delete();

            return redirect('/pemakaian');
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }
}
