<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nama_peminjam',
        'ormawa',
        'waktu_peminjaman',
        'waktu_pengembalian',
        'petugas'
    ];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
       