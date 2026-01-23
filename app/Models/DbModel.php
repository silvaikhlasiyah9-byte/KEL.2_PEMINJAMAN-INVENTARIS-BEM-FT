<?php

namespace App\Models;

use CodeIgniter\Model;

class DbModel extends Model
{
    protected $table = 'db';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama_barang',
        'stok',
        'tempat'
    ];
}
