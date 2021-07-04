<?php

namespace App\Controllers;

use App\Models\OrangModel;

class Orang extends BaseController
{
    protected $orangModel;
    public function __construct()
    {
        $this->orangModel = new OrangModel();
    }
    public function index()
    {

        $currentPage = $this->request->getVar('page_orang') ? $this->request->getVar('page_orang') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $orang = $this->orangModel->search($keyword);
        } else {
            $orang = $this->orangModel;
        }

        $data = [
            'title' => 'Daftar Orang',
            // 'orang' => $this->orangModel->findAll()
            'orang' => $orang->paginate(6, 'orang'),
            'pager' => $this->orangModel->pager,
            'currentPage' => $currentPage
        ];

        return  view('orang/index', $data);
    }
    public function update($id)
    {
        $this->orangModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'alamat' => $this->request->getVar('alamat')
        ]);

        return redirect()->to('/orang');
    }
    public function save()
    {
        foreach ($this->request->getVar('nama') as $key => $coba) {
            $data = [
                'nama' => $this->request->getVar('nama')[$key],
                'alamat' => $this->request->getVar('alamat')[$key]
            ];
            $save = $this->orangModel->insert($data);

            session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');
        }
        return redirect()->to('/orang');
    }
}
