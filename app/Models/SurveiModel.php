<?php

namespace App\Models;

use CodeIgniter\Model;

class SurveiModel extends Model
{
    protected $table            = 'survei';
    protected $primaryKey       = 'id';
    protected $allowedFields    = [
        'kode_survei',
        'nama_survei',
    ];
    protected $useTimestamps    = false;
}
