<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatModel extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'riwayat_pemakaian';

    protected $fillable = [
        'kendaraan_id',
        'tanggal_mulai',
        'tanggal_selesai',
        'keperluan',
        'lokasi_asal',
        'lokasi_tujuan',
        'jarak_tempuh',
        'driver_id',
        'status'
    ];

    public function kendaraan()
    {
        return $this->belongsTo(KendaraanModel::class);
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id')->where('role', 'driver');
    }

    public function pemakaianHarians()
    {
        return $this->hasMany(PemakaianHarianModel::class);
    }
}
