<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\KendaraanModel;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Bool_;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drivers = User::where('role', 'driver')->get();
        $approvers = User::where('role', 'staff')->get(); // User yang berperan sebagai pihak yang menyetujui
        $kendaraans = KendaraanModel::where('status', 'available')->get();

        $data = BookingModel::with(['kendaraan', 'driver', 'approvedBy'])->get();

        return view('dashboard.entry.entry', compact('drivers', 'approvers', 'kendaraans', 'data'));
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

            BookingModel::create([
                'kendaraan_id' => $request->input('kendaraan_id'),
                'driver_id' => $request->input('driver_id'),
                'approved_by' => $request->input('approved_by'),
                'tanggal_pemesanan' => $request->input('tanggal_pemesanan'),
                'keterangan' => $request->input('keterangan'),
                'status' => $request->input('status'),
            ]);

            KendaraanModel::find($request->input('kendaraan_id'))->update([
                'status' => 'unavailable',
            ]);

            return redirect('/entry');

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

            BookingModel::find($id)->update([
                'kendaraan_id' => $request->input('kendaraan_id'),
                'driver_id' => $request->input('driver_id'),
                'approved_by' => $request->input('approved_by'),
                'tanggal_pemesanan' => $request->input('tanggal_pemesanan'),
                'keterangan' => $request->input('keterangan'),
                'status' => $request->input('status'),
            ]);

            return redirect('/entry');

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
            BookingModel::find($id)->delete();

            return redirect('/entry');
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }
}
