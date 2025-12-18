<?php

namespace App\Controllers;

use App\Models\SurveiModel;

class SurveiController extends BaseController
{
    protected $surveiModel;

    public function __construct()
    {
        $this->surveiModel = new SurveiModel();
    }

    public function index()
    {
        $data['survei'] = $this->surveiModel->findAll();
        return view('survei/index', $data);
    }

    public function create()
    {
        return view('survei/create');
    }

    public function store()
    {
        $this->surveiModel->insert($this->request->getPost());
        return redirect()->to('/survei');
    }

    public function edit($id)
    {
        $data['survei'] = $this->surveiModel->find($id);

        return view('survei/edit', $data);
    }

    public function update($id)
    {
        $this->surveiModel->update($id, [
            'kode_survei' => $this->request->getPost('kode_survei'),
            'nama_survei' => $this->request->getPost('nama_survei'),
            'kegiatan' => $this->request->getPost('kegiatan'),
            'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
            'satuan' => $this->request->getPost('satuan'),
            'harga_satuan' => $this->request->getPost('harga_satuan'),
            'kode_beban_anggaran' => $this->request->getPost('kode_beban_anggaran'),
        ]);

        return redirect()->to('/survei')->with('success', 'Data survei berhasil diubah');
    }

    public function delete($id)
    {
        $this->surveiModel->delete($id);

        return redirect()->to('/survei')->with('success', 'Data survei berhasil dihapus');
    }
}
