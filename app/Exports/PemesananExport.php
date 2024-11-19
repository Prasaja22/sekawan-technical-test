<?php

namespace App\Exports;

use App\Models\BookingModel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PemesananExport implements FromView
{
    protected $startDate;
    protected $endDate;

    public function __construct($startDate, $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function view(): View
    {
        $data = BookingModel::with(['kendaraan', 'driver', 'approvedBy', 'bookedBy'])
            ->whereBetween('tanggal_pemesanan', [$this->startDate, $this->endDate])
            ->get();

        return view('exports.pemesanan', [
            'data' => $data,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate
        ]);
    }

    public function headings(): array
    {
        return [
            'No',
            'Nama Kendaraan',
            'Driver',
            'Dipesan Oleh',
            'Disetujui Oleh',
            'Tanggal Pemesanan',
            'Keterangan',
            'Status'
        ];
    }

    /**
     * Styling untuk file Excel
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style untuk header
            1 => ['font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']], 'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '4CAF50']]],
            // Kolom data
            'A' => ['alignment' => ['horizontal' => 'center']],
        ];
    }
}
