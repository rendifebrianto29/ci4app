<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | WEB',
            'tes' => ['satu', 'dua', 'tiga']
        ];

        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];

        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. abc No.10',
                    'kota' =>  'Probolinggo'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Suprapto No.123',
                    'kota' => 'Probolinggo'
                ]
            ]
        ];

        return view('pages/contact', $data);
    }
}
