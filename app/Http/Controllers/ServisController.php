<?php

namespace App\Http\Controllers;

use App\Models\KendaraanModel;
use App\Models\ServisModel;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use PHPUnit\Framework\MockObject\ReturnValueGenerator;

class ServisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kendaraan = KendaraanModel::all();

        $data = ServisModel::with(['kendaraan'])->get();

        return view('dashboard.servis.servis', compact('kendaraan', 'data'));
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
            ServisModel::create([
                'kendaraan_id' => $request->input('kendaraan_id'),
                'tanggal_servis' => $request->input('tanggal_servis'),
                'jenis_servis' => $request->input('jenis_servis'),
                'biaya_servis' => $request->input('biaya_servis'),
                'keterangan' =>  $request->input('keterangan'),
            ]);

            return redirect('/servis');
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

            ServisModel::find($id)->update([
                'kendaraan_id' => $request->input('kendaraan_id'),
                'tanggal_servis' => $request->input('tanggal_servis'),
                'jenis_servis' => $request->input('jenis_servis'),
                'biaya_servis' => $request->input('biaya_servis'),
                'keterangan' =>  $request->input('keterangan'),
            ]);

            return redirect('/servis');

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
            ServisModel::find($id)->delete();

            return redirect('/servis');
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }
}
