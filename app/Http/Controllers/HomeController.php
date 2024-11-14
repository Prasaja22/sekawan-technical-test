<?php

namespace App\Http\Controllers;

use App\Models\BookingModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // Pass data ke view
        return view('dashboard.home.home');
    }

  // HomeController.php
    public function getBookingSparklineData()
    {
        $data = BookingModel::with('kendaraan')
            ->selectRaw('kendaraan_id, status, COUNT(*) as count')
            ->groupBy('kendaraan_id', 'status')
            ->get()
            ->groupBy('kendaraan.nama'); // Asumsikan 'nama' adalah atribut pada relasi kendaraan

        $result = [];

        foreach ($data as $kendaraan => $statuses) {
            $result[$kendaraan] = [
                'approved' => $statuses->where('status', 'approved')->sum('count'),
                'pending' => $statuses->where('status', 'pending')->sum('count'),
                'rejected' => $statuses->where('status', 'rejected')->sum('count')
            ];
        }

        return response()->json($result);
    }



}
