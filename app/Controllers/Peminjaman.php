<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\DbModel;
use App\Models\DetailPeminjamanModel;


class Peminjaman extends BaseController
{
    protected $peminjamanModel;

    public function __construct()
    {
        $this->peminjamanModel = new PeminjamanModel();
    }

    // Menampilkan semua data peminjaman
  public function index()
{
    $dbModel = new DbModel();

    $data = [
        'tittle'       => 'BEM FT | Data Peminjaman',
        'peminjaman'  => $this->peminjamanModel->findAll(),
        'nama_barang' => $dbModel->findAll()
    ];

    return view('peminjaman/index', $data);
}

public function store_dynamic()
{
    $peminjamanModel = $this->peminjamanModel;
    $DetailPeminjamanModel = new DetailPeminjamanModel();
    $dbModel = new \App\Models\DbModel(); // Pastikan ini model untuk tabel barang
    $db = \Config\Database::connect(); // Jangan ubah variabel ini lagi!

    $db->transStart();

    // Ambil input form
    $nama_peminjam = $this->request->getPost('nama_peminjam');
    $ormawa        = $this->request->getPost('ormawa');
    $petugas       = $this->request->getPost('petugas');
    $waktu_peminjaman  = str_replace('T',' ',$this->request->getPost('waktu_peminjaman'));
    $waktu_pengembalian = str_replace('T',' ',$this->request->getPost('waktu_pengembalian'));

    $barang_ids = $this->request->getPost('barang_id');
    $jumlah     = $this->request->getPost('jumlah');

    // Validasi stok (optimalkan: ambil data barang sekali saja)
    foreach($barang_ids as $i => $barang_id) {
        $barang = $dbModel->find($barang_id);
        if (!$barang) {
            $db->transRollback();
            return redirect()->back()->with('error', 'Barang tidak ditemukan!');
        }
        if($jumlah[$i] > $barang['stok']) {
            $db->transRollback();
            return redirect()->back()->with('error', 'Stok barang "' . $barang['nama_barang'] . '" tidak cukup!');
        }
    }

    // Simpan data peminjaman
    $peminjamanModel->insert([
        'nama_peminjam'   => $nama_peminjam,
        'ormawa'          => $ormawa,
        'petugas'         => $petugas,
        'waktu_peminjaman'  => $waktu_peminjaman,
        'waktu_pengembalian' => $waktu_pengembalian,
    ]);

    $peminjaman_id = $peminjamanModel->insertID();

    foreach($barang_ids as $i => $barang_id) {
        // Simpan detail peminjaman
        $DetailPeminjamanModel->insert([
            'peminjaman_id' => $peminjaman_id,
            'barang_id'     => $barang_id,
            'qty'           => $jumlah[$i]
        ]);

        // Kurangi stok barang (gunakan variabel lain, misal $barang_sekarang)
        $barang_sekarang = $dbModel->find($barang_id);
        if (!$barang_sekarang) {
            $db->transRollback();
            return redirect()->back()->with('error', 'Gagal memperbarui stok barang!');
        }
        $dbModel->update($barang_id, [
            'stok' => $barang_sekarang['stok'] - $jumlah[$i]
        ]);
    }

    // Selesaikan transaksi dan cek statusnya
    $db->transComplete();
    if ($db->transStatus() === FALSE) {
        return redirect()->back()->with('error', 'Gagal menyimpan data peminjaman!');
    }

    return redirect()->to('/peminjaman')->with('success','Data peminjaman berhasil disimpan');
}

public function riwayat()
{

    $db = \Config\Database::connect();

    $builder = $db->table('peminjaman');
    $builder->select('peminjaman.id as peminjaman_id, nama_peminjam, ormawa, petugas, waktu_peminjaman, waktu_pengembalian, db.nama_barang, detail_peminjaman.qty as jumlah');
    $builder->join('detail_peminjaman', 'detail_peminjaman.peminjaman_id = peminjaman.id');
    $builder->join('db', 'db.id = detail_peminjaman.barang_id');
    $builder->orderBy('peminjaman.created_at', 'DESC');

    $query = $builder->get();
    $data = $query->getResultArray();

    // Group data berdasarkan peminjaman_id
    $riwayat = [];
    foreach($data as $row){
        $id = $row['peminjaman_id'];
        if(!isset($riwayat[$id])){
            $riwayat[$id] = [
                'nama_peminjam' => $row['nama_peminjam'],
                'ormawa'        => $row['ormawa'],
                'petugas'       => $row['petugas'],
                'waktu_peminjaman'=> $row['waktu_peminjaman'],
                'waktu_pengembalian'=> $row['waktu_pengembalian'],
                'barang'        => []
            ];
        }
        $riwayat[$id]['barang'][] = [
            'nama_barang' => $row['nama_barang'],
            'jumlah'      => $row['jumlah']
        ];
    }

    return view('peminjaman/riwayat', [
        'riwayat' => $riwayat,
        'tittle'  => 'BEM FT | Riwayat Peminjaman'
        ]);
}
}
