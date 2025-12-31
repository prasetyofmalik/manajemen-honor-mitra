<?php

namespace App\Models;

use CodeIgniter\Model;

class KegiatanMitraModel extends Model
{
    protected $table            = 'kegiatan_mitra';
    protected $primaryKey       = 'id';

    protected $allowedFields    = [
        'mitra_id',
        'jabatan',
        'kegiatan_id',
        'bulan_kegiatan',
        'bulan_pembayaran_honor',
        'bulan_pembayaran_pulsa',
        'honor',
        'pulsa'
    ];
    protected $useTimestamps    = false;
}
