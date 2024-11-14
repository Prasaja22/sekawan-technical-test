<?php

namespace App\Http\Controllers;

use App\Models\KendaraanModel;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = KendaraanModel::all();

        return view('dashboard.kendaraan.kendaraan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            KendaraanModel::create([
                'nomor_polisi' => $request->input('nomor_polisi'),
                'merk' => $request->input('merk'),
                'model' => $request->input('model'),
                'tahun_produksi' => $request->input('tahun_produksi'),
                'jenis' => $request->input('jenis'),
                'kapasitas_tangki' => $request->input('kapasitas_tangki'),
                'jarak_tempuh_total' => $request->input('jarak_tempuh_total'),
            ]);

            return redirect('/kendaraan');
        } catch  (\Exception $e) {
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

            KendaraanModel::find($id)->update([
                'nomor_polisi' => $request->input('nomor_polisi'),
                'merk' => $request->input('merk'),
                'model' => $request->input('model'),
                'tahun_produksi' => $request->input('tahun_produksi'),
                'jenis' => $request->input('jenis'),
                'kapasitas_tangki' => $request->input('kapasitas_tangki'),
                'jarak_tempuh_total' => $request->input('jarak_tempuh_total'),
            ]);

            return redirect('/kendaraan');

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

            KendaraanModel::find($id)->delete();

            return redirect('/kendaraan');

        } catch (\Exception $e) {
            return response()->json($e);
        }
    }
}
