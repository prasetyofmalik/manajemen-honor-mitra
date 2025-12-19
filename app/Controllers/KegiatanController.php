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
        $surveiId = $this->request->getGet('survei_id');

        return view('kegiatan/create', [
            'survei_id' => $surveiId
        ]);
    }

    public function store()
    {
        $model = new KegiatanModel();

        $model->insert([
            'survei_id'      => $this->request->getPost('survei_id'),
            'nama_kegiatan'  => $this->request->getPost('nama_kegiatan'),
            'tanggal_mulai'  => $this->request->getPost('tanggal_mulai'),
            'tanggal_selesai' => $this->request->getPost('tanggal_selesai'),
            'status'         => 'perencanaan'
        ]);

        return redirect()->to('/survei')->with('success', 'Kegiatan berhasil ditambahkan');
    }

    public function edit($id)
    {
        $model = new KegiatanModel();

        return view('kegiatan/edit', [
            'kegiatan' => $model->find($id)
        ]);
    }
}
