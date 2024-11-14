<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\KendaraanModel;
use App\Models\PemakaianHarianModel;
use App\Models\RiwayatModel;
use App\Models\ServisModel;
use App\Models\User;
use Illuminate\Http\Request;

class PenggunaanController extends Controller
{
    public function index(){
        $drivers = User::where('role', 'driver')->get();
        $approvers = User::where('role', 'staff')->get(); // User yang berperan sebagai pihak yang menyetujui
        $kendaraans = KendaraanModel::where('status', 'available')->get();

        $data = BookingModel::with(['kendaraan', 'driver', 'approvedBy'])
        ->where('status', 'approved')
        ->get();


        return view('dashboard.penggunaan.penggunaan', compact('data', 'kendaraans', 'approvers', 'drivers'));
    }

    public function bbmStore(Request $request){
        try {
            // Create the PemakaianHarian record
            PemakaianHarianModel::create([
                'tanggal' => $request->input('tanggal'),
                'kendaraan_id' => $request->input('kendaraan_id'),
                'jarak_tempuh_harian' => $request->input('jarak_tempuh_harian'),
                'bahan_bakar_digunakan' => $request->input('bahan_bakar_digunakan'),
                'driver_id' => $request->input('driver_id'),
            ]);


            return back();
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    public function servisStore(Request $request){
        try {
            ServisModel::create([
                'kendaraan_id' => $request->input('kendaraan_id'),
                'tanggal_servis' => $request->input('tanggal_servis'),
                'jenis_servis' => $request->input('jenis_servis'),
                'biaya_servis' => $request->input('biaya_servis'),
                'keterangan' =>  $request->input('keterangan'),
            ]);

            return back();
        } catch (\Exception $e) {
            return response()->json($e);
        }
    }

    public function riwayatStore(Request $request){
        try{
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

            BookingModel::find($request->id)->update([
                'status' => 'done',
            ]);

            KendaraanModel::find($request->kendaraan_id)->update([
                'status' => 'available',
            ]);

            return back();
        } catch (\Exception $e){
            return response()->json($e);
        }
    }
}
