<?php

namespace App\Controllers;

class DataBarang extends BaseController
{
    protected $DbModel;
    public function __construct()
    {
$this->DbModel = new \App\Models\DbModel();
    }

public function index(): string
{
     $db = $this->DbModel->findAll();
     $data = [
            'tittle' => 'BEM FT | Data Barang',
            'db' => $db
       ];


    return view('databarang/index', $data);
}

public function create()
{
    $data = [
    'tittle' => 'Form Tambah Data Barang'
    ];

    return view('databarang/create', $data);
}

public function save()
{
    $this->DbModel->save([
        'nama_barang' => $this->request->getVar('nama_barang'),
        'stok' => $this->request->getVar('stok'),
        'tempat' => $this->request->getVar('tempat')
    ]);

    return redirect()->to('/databarang');

}

public function delete($id)
{
    $this->DbModel->delete($id);
    return redirect()->to('/databarang');
}

public function edit($id)
{
    $db = $this->DbModel->find($id);
    $data = [
        'tittle' => 'Form Edit Data Barang',
        'db' => $db
    ];

    return view('databarang/edit', $data);
}
public function update($id)
{
    $this->DbModel->update($id, [
        'nama_barang' => $this->request->getVar('nama_barang'),
        'stok' => $this->request->getVar('stok'),
        'tempat' => $this->request->getVar('tempat')
    ]);

    return redirect()->to('/databarang');

}
}