<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingModel extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'booking';
    protected $fillable = [
        'kendaraan_id',
        'driver_id',
        'approved_by',
        'tanggal_pemesanan',
        'keterangan',
        'status'
    ];

    public function kendaraan() {
        return $this->belongsTo(KendaraanModel::class, 'kendaraan_id');
    }

    public function driver() {
        return $this->belongsTo(User::class, 'driver_id')->where('role', 'driver');
    }

    public function approvedBy() {
        return $this->belongsTo(User::class, 'approved_by');
    }
}
