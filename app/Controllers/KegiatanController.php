<?php

namespace App\Controllers;

use App\Models\KegiatanModel;
use App\Models\SurveiModel;

class KegiatanController extends BaseController
{
    protected $kegiatanModel;
    protected $surveiModel;

    public function __construct()
    {
        $this->kegiatanModel = new KegiatanModel();
        $this->surveiModel   = new SurveiModel();
    }

    // public function index($surveiId)
    // {

    //     $data = [
    //         'survei' => $this->surveiModel->find($surveiId),
    //         'kegiatan' => $this->kegiatanModel
    //             ->where('survei_id', $surveiId)
    //             ->findAll()
    //     ];


    //     return view('kegiatan/index', $data);
    // }

    public function create()
    {
        $survei = $this->surveiModel->find($this->request->getGet('survei_id'));

        return view('kegiatan/create', [
            'survei' => $survei
        ]);
    }

    public function store()
    {
        $surveiId = $this->request->getPost('survei_id');

        // validate survei exists
        if (empty($surveiId) || !$this->surveiModel->find((int) $surveiId)) {
            return redirect()->back()->withInput()->with('error', 'Survei tidak valid atau tidak ditemukan.');
        }

        $model = new KegiatanModel();

        $model->insert([
            'survei_id'      => (int) $surveiId,
            'nama_kegiatan'  => $this->request->getPost('nama_kegiatan'),
            'tanggal_mulai'  => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
            'satuan'         => $this->request->getPost('satuan'),
            'harga_satuan'   => $this->request->getPost('harga_satuan'),
            'kode_beban_anggaran' => $this->request->getPost('kode_beban_anggaran'),
        ]);

        return redirect()->to('/survei')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = new KegiatanModel();

        return view('kegiatan/edit', [
            'kegiatan' => $model->find($id),
            'survei'   => $this->surveiModel->find($model->find($id)['survei_id'])
        ]);
    }

    public function update($id)
    {
        $surveiId = $this->request->getPost('survei_id');

        // validate survei exists
        if (empty($surveiId) || !$this->surveiModel->find((int) $surveiId)) {
            return redirect()->back()->withInput()->with('error', 'Survei tidak valid atau tidak ditemukan.');
        }

        $this->kegiatanModel->update($id, [
            'survei_id'      => (int) $surveiId,
            'nama_kegiatan'  => $this->request->getPost('nama_kegiatan'),
            'tanggal_mulai'  => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
            'satuan'         => $this->request->getPost('satuan'),
            'harga_satuan'   => $this->request->getPost('harga_satuan'),
            'kode_beban_anggaran' => $this->request->getPost('kode_beban_anggaran'),
        ]);

        return redirect()->to('/survei')->with('success', 'Kegiatan survei berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->kegiatanModel->delete($id);
        return redirect()->to('/survei')->with('success', 'Kegiatan survei berhasil dihapus');
    }

    /**
     * Return kegiatan list for a given survei as JSON (used by AJAX)
     */
    public function bySurvei($surveiId)
    {
        $model = new KegiatanModel();

        $list = $model->where('survei_id', (int) $surveiId)->findAll();

        // return minimal fields to the client
        $result = array_map(function ($k) {
            return [
                'id' => $k['id'],
                'nama_kegiatan' => $k['nama_kegiatan'],
            ];
        }, $list ?: []);

        return $this->response->setJSON($result);
    }
}
