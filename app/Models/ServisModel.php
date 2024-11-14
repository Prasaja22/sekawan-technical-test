<?php

namespace App\Models;

use App\Http\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServisModel extends Model
{
    use HasFactory;
    use Uuid;

    protected $table = 'servis_kendaraan';

    protected $fillable = [
        'kendaraan_id',
        'tanggal_servis',
        'jenis_servis',
        'biaya_servis',
        'keterangan'
    ];

    public function kendaraan()
    {
        return $this->belongsTo(KendaraanModel::class);
    }
}
