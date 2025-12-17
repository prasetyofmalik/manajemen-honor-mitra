<?php

namespace App\Controllers;

use App\Models\MitraModel;

class MitraController extends BaseController
{
    protected $mitraModel;

    public function __construct()
    {
        $this->mitraModel = new MitraModel();
    }

    // tampilkan daftar mitra
    public function index()
    {
        $data['mitra'] = $this->mitraModel->findAll();

        return view('mitra/index', $data);
    }

    // form tambah mitra
    public function create()
    {
        return view('mitra/create');
    }

    // simpan data mitra
    public function store()
    {
        $this->mitraModel->insert([
            'sobat_id' => $this->request->getPost('sobat_id'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'posisi' => $this->request->getPost('posisi'),
            'alamat' => $this->request->getPost('alamat'),
            'jk' => $this->request->getPost('jk'),
            'pendidikan' => $this->request->getPost('pendidikan'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'no_telp' => $this->request->getPost('no_telp'),
            'email' => $this->request->getPost('email'),
            'nik' => $this->request->getPost('nik'),
            'nama_bank' => $this->request->getPost('nama_bank'),
            'nomor_rekening' => $this->request->getPost('nomor_rekening'),
            'rekening_nama' => $this->request->getPost('rekening_nama'),
        ]);

        return redirect()->to('/mitra')->with('success', 'Data mitra berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data['mitra'] = $this->mitraModel->find($id);

        return view('mitra/edit', $data);
    }

    public function update($id)
    {
        $this->mitraModel->update($id, [
            'sobat_id' => $this->request->getPost('sobat_id'),
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'posisi' => $this->request->getPost('posisi'),
            'alamat' => $this->request->getPost('alamat'),
            'jk' => $this->request->getPost('jk'),
            'pendidikan' => $this->request->getPost('pendidikan'),
            'pekerjaan' => $this->request->getPost('pekerjaan'),
            'no_telp' => $this->request->getPost('no_telp'),
            'email' => $this->request->getPost('email'),
            'nik' => $this->request->getPost('nik'),
            'nama_bank' => $this->request->getPost('nama_bank'),
            'nomor_rekening' => $this->request->getPost('nomor_rekening'),
            'rekening_nama' => $this->request->getPost('rekening_nama'),
        ]);

        return redirect()->to('/mitra')->with('success', 'Data mitra berhasil diubah');
}

    public function delete($id)
    {
        $this->mitraModel->delete($id);

        return redirect()->to('/mitra')->with('success', 'Data mitra berhasil dihapus');
    }
}
