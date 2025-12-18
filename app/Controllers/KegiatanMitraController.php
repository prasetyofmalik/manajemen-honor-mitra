<?php

namespace App\Controllers;

use App\Models\KegiatanMitraModel;
use App\Models\MitraModel;
use App\Models\SurveiModel;

class KegiatanMitraController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data['kegiatan_mitra'] = $db->query("
            SELECT km.*, m.nama_lengkap, s.kode_survei
            FROM kegiatan_mitra km
            JOIN mitra m ON km.mitra_id = m.id
            JOIN survei s ON km.survei_id = s.id
        ")->getResultArray();

        return view('kegiatan_mitra/index', $data);
    }

    public function create()
    {
        $mitraModel = new MitraModel();
        $surveiModel = new SurveiModel();

        return view('kegiatan_mitra/create', [
            'mitra' => $mitraModel->findAll(),
            'survei' => $surveiModel->findAll()
        ]);
    }

    public function store()
    {
        $model = new KegiatanMitraModel();
        $model->insert($this->request->getPost());

        return redirect()->to('/kegiatan-mitra');
    }

    // form edit
    public function edit($id)
    {
        $model = new KegiatanMitraModel();
        $mitraModel = new MitraModel();
        $surveiModel = new SurveiModel();

        return view('kegiatan_mitra/edit', [
            'data' => $model->find($id),
            'mitra' => $mitraModel->findAll(),
            'survei' => $surveiModel->findAll()
        ]);
    }

    // update
    public function update($id)
    {
        $model = new KegiatanMitraModel();
        $model->update($id, $this->request->getPost());

        return redirect()->to('/kegiatan-mitra')->with('success', 'Data berhasil diubah');
    }

    // delete
    public function delete($id)
    {
        $model = new KegiatanMitraModel();
        $model->delete($id);

        return redirect()->to('/kegiatan-mitra')->with('success', 'Data berhasil dihapus');
    }
}
