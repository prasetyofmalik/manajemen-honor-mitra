<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KegiatanMitraModel;
use App\Models\MitraModel;
use App\Models\SurveiModel;

class DashboardController extends BaseController
{
    protected $kegiatanMitraModel;
    protected $mitraModel;
    protected $surveiModel;

    public function __construct()
    {
        $this->kegiatanMitraModel = new KegiatanMitraModel();
        $this->mitraModel         = new MitraModel();
        $this->surveiModel        = new SurveiModel();
    }

    public function index()
    {
        // default filter bulan (boleh kosong)
        $filter = [
            'bulan_kegiatan'          => $this->request->getGet('bulan_kegiatan'),
            'bulan_pembayaran_honor'  => $this->request->getGet('bulan_pembayaran_honor'),
            'bulan_pembayaran_pulsa'  => $this->request->getGet('bulan_pembayaran_pulsa'),
        ];

        $pivotData = $this->buildPivot($filter);

        return view('dashboard/index', [
            'filter'    => $filter,
            'mitra'     => $pivotData['mitra'],
            'survei'    => $pivotData['survei'],
            'matrix'    => $pivotData['matrix'],
            'rowTotal'  => $pivotData['rowTotal'],
            'colTotal'  => $pivotData['colTotal'],
            'grandTotal' => $pivotData['grandTotal'],
        ]);
    }

    /**
     * Core logic pivot table
     */
    private function buildPivot(array $filter): array
    {
        $builder = $this->kegiatanMitraModel
            ->select('
                kegiatan_mitra.mitra_id,
                mitra.nama_lengkap,
                kegiatan.survei_id,
                survei.kode_survei,
                SUM(kegiatan_mitra.honor) AS total_honor
            ')
            ->join('mitra', 'mitra.id = kegiatan_mitra.mitra_id')
            ->join('kegiatan', 'kegiatan.id = kegiatan_mitra.kegiatan_id')
            ->join('survei', 'survei.id = kegiatan.survei_id')
            ->groupBy('kegiatan_mitra.mitra_id, kegiatan.survei_id');

        // filter dinamis
        if (!empty($filter['bulan_kegiatan'])) {
            $builder->where('kegiatan_mitra.bulan_kegiatan', $filter['bulan_kegiatan']);
        }

        if (!empty($filter['bulan_pembayaran_honor'])) {
            $builder->where('kegiatan_mitra.bulan_pembayaran_honor', $filter['bulan_pembayaran_honor']);
        }

        if (!empty($filter['bulan_pembayaran_pulsa'])) {
            $builder->where('kegiatan_mitra.bulan_pembayaran_pulsa', $filter['bulan_pembayaran_pulsa']);
        }

        $rows = $builder->findAll();

        // master data
        $mitra  = $this->mitraModel->orderBy('nama_lengkap')->findAll();
        $survei = $this->surveiModel->orderBy('kode_survei')->findAll();

        // inisialisasi matrix
        $matrix = [];
        $rowTotal = [];
        $colTotal = [];
        $grandTotal = 0;

        foreach ($mitra as $m) {
            foreach ($survei as $s) {
                $matrix[$m['id']][$s['id']] = 0;
            }
            $rowTotal[$m['id']] = 0;
        }

        foreach ($survei as $s) {
            $colTotal[$s['id']] = 0;
        }

        // isi pivot
        foreach ($rows as $r) {
            $matrix[$r['mitra_id']][$r['survei_id']] = (int) $r['total_honor'];

            $rowTotal[$r['mitra_id']] += $r['total_honor'];
            $colTotal[$r['survei_id']] += $r['total_honor'];
            $grandTotal += $r['total_honor'];
        }

        return compact(
            'mitra',
            'survei',
            'matrix',
            'rowTotal',
            'colTotal',
            'grandTotal'
        );
    }
}
