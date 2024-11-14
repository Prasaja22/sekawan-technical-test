<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PemakaianHarianModel extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'pemakaian_harian';

    protected $fillable = [
        'tanggal',
        'kendaraan_id',
        'jarak_tempuh_harian',
        'bahan_bakar_digunakan',
        'driver_id'
    ];

    public function kendaraan()
    {
        return $this->belongsTo(KendaraanModel::class);
    }

    public function driver()
    {
        return $this->belongsTo(User::class, 'driver_id')->where('role', 'driver');
    }

    public function riwayatPenggunaan()
    {
        return $this->belongsTo(RiwayatModel::class);
    }
}
