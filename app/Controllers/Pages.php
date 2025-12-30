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

     public function about()
    {
         $data = [
            'tittle' => 'BEM FT | Barang'
        ];
        echo view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'tittle' => 'BEM FT | Contact'
        ];
        echo view('pages/contact', $data);
    }
}
