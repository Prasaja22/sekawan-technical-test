<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use App\Models\KendaraanModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemesananController extends Controller
{
    public function index(){

        $drivers = User::where('role', 'driver')->get();
        $approvers = User::where('role', 'staff')->get(); // User yang berperan sebagai pihak yang menyetujui
        $kendaraans = KendaraanModel::where('status', 'available')->get();

        $data = BookingModel::with(['kendaraan', 'driver', 'approvedBy'])->get();

        $dataUser = BookingModel::with(['kendaraan', 'driver', 'approvedBy'])
        ->where('status', 'approved')->where('booked_by', Auth::user()->id)
        ->get();

        return view('dashboard.pemesanan.pemesanan', compact('data', 'kendaraans', 'approvers', 'drivers', 'dataUser'));
    }

    public function update(Request $request, string $id){
        try {

            BookingModel::find($id)->update([
                'status' => $request->input('status'),
            ]);

            return redirect('/pemesanan');

        } catch (\Exception $e) {
            return response()->json($e);
        }
    }
}
