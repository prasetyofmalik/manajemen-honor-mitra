<?php

namespace App\Controllers;

use App\Models\KegiatanMitraModel;
use App\Models\MitraModel;
use App\Models\SurveiModel;
use App\Models\KegiatanModel;

class KegiatanMitraController extends BaseController
{
    protected $kegiatanMitraModel;
    protected $mitraModel;
    protected $surveiModel;
    protected $kegiatanModel;

    public function __construct()
    {
        $this->kegiatanMitraModel = new KegiatanMitraModel();
        $this->mitraModel        = new MitraModel();
        $this->surveiModel       = new SurveiModel();
        $this->kegiatanModel     = new KegiatanModel();
    }
    public function index()
    {
        $data['kegiatan_mitra'] = $this->kegiatanMitraModel
            ->select('
                kegiatan_mitra.*,
                mitra.nama_lengkap,
                survei.kode_survei,
                kegiatan.kegiatan
            ')
            ->join('mitra', 'mitra.id = kegiatan_mitra.mitra_id')
            ->join('kegiatan', 'kegiatan.id = kegiatan_mitra.kegiatan_id')
            ->join('survei', 'survei.id = kegiatan.survei_id')
            ->orderBy('kegiatan_mitra.id', 'DESC')
            ->findAll();

        return view('kegiatan_mitra/index', $data);
    }

    public function create()
    {
        return view('kegiatan_mitra/create', [
            'mitra'  => $this->mitraModel->findAll(),
            'survei' => $this->surveiModel->findAll(),
            // kegiatan dikosongkan dulu, diisi via AJAX
            'kegiatan' => []
        ]);
    }

    public function store()
    {
        $data = [
            'mitra_id'                  => $this->request->getPost('mitra_id'),
            'kegiatan_id'               => $this->request->getPost('kegiatan_id'),
            'bulan_kegiatan'            => $this->request->getPost('bulan_kegiatan'),
            'bulan_pembayaran_honor'    => $this->request->getPost('bulan_pembayaran_honor'),
            'bulan_pembayaran_pulsa'    => $this->request->getPost('bulan_pembayaran_pulsa'),
            'honor'                     => $this->request->getPost('honor'),
            'pulsa'                     => $this->request->getPost('pulsa'),
        ];

        $this->kegiatanMitraModel->insert($data);

        return redirect()->to('/kegiatan-mitra')
            ->with('success', 'Data kegiatan mitra berhasil ditambahkan');
    }
    public function edit($id)
    {
        $kegiatanMitra = $this->kegiatanMitraModel->find($id);

        if (!$kegiatanMitra) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data tidak ditemukan');
        }

        // ambil survei dari kegiatan yang dipilih
        $kegiatan = $this->kegiatanModel->find($kegiatanMitra['kegiatan_id']);

        return view('kegiatan_mitra/edit', [
            'kegiatan_mitra' => $kegiatanMitra,
            'mitra'          => $this->mitraModel->findAll(),
            'survei'         => $this->surveiModel->findAll(),
            'kegiatan'       => $this->kegiatanModel
                ->where('survei_id', $kegiatan['survei_id'])
                ->findAll(),
            'selectedSurvei' => $kegiatan['survei_id']
        ]);
    }

    public function update($id)
    {
        $data = [
            'mitra_id'                  => $this->request->getPost('mitra_id'),
            'kegiatan_id'               => $this->request->getPost('kegiatan_id'),
            'bulan_kegiatan'            => $this->request->getPost('bulan_kegiatan'),
            'bulan_pembayaran_honor'    => $this->request->getPost('bulan_pembayaran_honor'),
            'bulan_pembayaran_pulsa'    => $this->request->getPost('bulan_pembayaran_pulsa'),
            'honor'                     => $this->request->getPost('honor'),
            'pulsa'                     => $this->request->getPost('pulsa'),
        ];

        $this->kegiatanMitraModel->update($id, $data);

        return redirect()->to('/kegiatan-mitra')
            ->with('success', 'Data kegiatan mitra berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->kegiatanMitraModel->delete($id);

        return redirect()->to('/kegiatan-mitra')
            ->with('success', 'Data kegiatan mitra berhasil dihapus');
    }
}
