<?php

namespace App\Http\Controllers;

use App\Exports\PemesananExport;
use App\Models\BookingModel;
use App\Models\RiwayatModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.home.home');
    }

  // HomeController.php
    public function getChartData()
    {
        $data = RiwayatModel::with('kendaraan') // Load kendaraan relationship
        ->selectRaw('kendaraan_id, COUNT(id) as total_pemakaian')
        ->groupBy('kendaraan_id')
        ->get()
        ->map(function ($item) {
            return [
                'kendaraan' => $item->kendaraan->nama_kendaraan, // Use the accessor
                'total_pemakaian' => $item->total_pemakaian,
            ];
        });

        $labels = $data->pluck('kendaraan');
        $values = $data->pluck('total_pemakaian');

        return response()->json([
            'labels' => $labels,
            'data' => $values
        ]);
    }

    public function exportLaporan(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        return Excel::download(new PemesananExport($startDate, $endDate), 'laporan_pemesanan.xlsx');
    }

}
