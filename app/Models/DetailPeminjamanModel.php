<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPeminjamanModel extends Model
{
    protected $table = 'detail_peminjaman';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'peminjaman_id',
        'barang_id',
        'qty'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
