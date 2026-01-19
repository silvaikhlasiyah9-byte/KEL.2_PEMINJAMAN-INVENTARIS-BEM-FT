<?php

namespace App\Controllers;

class pages extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'BEM FT | Home'
        ];
        echo view('pages/home', $data);
    }


    public function riwayatpeminjaman()
    {
         $data = [
            'tittle' => 'BEM FT | Riwayat Peminjaman'
        ];
        echo view('pages/riwayatpeminjaman', $data);
    }

    public function contact()
    {
        $data = [
            'tittle' => 'BEM FT | Contact'
        ];
        echo view('pages/contact', $data);
    }
}
