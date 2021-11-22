<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $session = session();
        $data = [
            'title' => 'Home | Selamat Datang'
        ];
        return view('home/index', $data);
    }
}
