<?php

namespace App\Controllers;

use App\Models\SurveiModel;
use App\Models\KegiatanModel;

class SurveiController extends BaseController
{
    protected $surveiModel;
    protected $kegiatanModel;

    public function __construct()
    {
        $this->surveiModel = new SurveiModel();
        $this->kegiatanModel = new KegiatanModel();
    }

    public function index()
    {
        $surveiModel   = new SurveiModel();
        $kegiatanModel = new KegiatanModel();

        $survei = $surveiModel->findAll();

        foreach ($survei as &$s) {
            $s['kegiatan'] = $kegiatanModel
                ->where('survei_id', $s['id'])
                ->findAll();
        }

        return view('survei/index', [
            'survei' => $survei
        ]);
    }

    public function create()
    {
        return view('survei/create');
    }

    public function store()
    {
        $this->surveiModel->save([
            'kode_survei' => $this->request->getPost('kode_survei'),
            'nama_survei' => $this->request->getPost('nama_survei'),
        ]);

        return redirect()->to('/survei')->with('success', 'Survei berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('survei/edit', [
            'survei' => $this->surveiModel->find($id)
        ]);
    }

    public function update($id)
    {
        $this->surveiModel->update($id, [
            'kode_survei' => $this->request->getPost('kode_survei'),
            'nama_survei' => $this->request->getPost('nama_survei'),
        ]);

        return redirect()->to('/survei')->with('success', 'Survei berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->surveiModel->delete($id);
        return redirect()->to('/survei')->with('success', 'Survei berhasil dihapus');
    }
}
