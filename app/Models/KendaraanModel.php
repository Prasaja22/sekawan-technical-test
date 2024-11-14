<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KendaraanModel extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'kendaraan';

    protected $fillable = [
        'nomor_polisi',
        'merk',
        'model',
        'tahun_produksi',
        'jenis',
        'kapasitas_tangki',
        'jarak_tempuh_total',
        'status'
    ];

    public function pemakaianHarians()
    {
        return $this->hasMany(PemakaianHarianModel::class);
    }

    public function servisKendaraans()
    {
        return $this->hasMany(ServisModel::class);
    }

    public function riwayatPenggunaans()
    {
        return $this->hasMany(RiwayatModel::class);
    }

    public function bookings()
    {
        return $this->hasMany(BookingModel::class, 'kendaraan_id');
    }
}
