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
        $filter = [
            'bulan_kegiatan'          => $this->request->getGet('bulan_kegiatan'),
            'bulan_pembayaran_honor'  => $this->request->getGet('bulan_pembayaran_honor'),
            'bulan_pembayaran_pulsa'  => $this->request->getGet('bulan_pembayaran_pulsa'),
        ];

        $pivotData = $this->buildPivot($filter);

        return view('dashboard/index', [
            'filter'      => $filter,
            'mitra'       => $pivotData['mitra'],
            'survei'      => $pivotData['survei'],
            'matrix'      => $pivotData['matrix'],
            'rowTotal'    => $pivotData['rowTotal'],
            'colTotal'    => $pivotData['colTotal'],
            'colHonorTotal' => $pivotData['colHonorTotal'],
            'colPulsaTotal' => $pivotData['colPulsaTotal'],
            'grandTotal'  => $pivotData['grandTotal'],
        ]);
    }

    private function buildPivot(array $filter): array
    {
        $builder = $this->kegiatanMitraModel
            ->select('
            kegiatan_mitra.mitra_id,
            kegiatan_mitra.honor,
            kegiatan_mitra.pulsa,
            kegiatan.survei_id,
            kegiatan.nama_kegiatan
        ')
            ->join('kegiatan', 'kegiatan.id = kegiatan_mitra.kegiatan_id');

        // Apply filters
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
        $mitra  = $this->mitraModel->orderBy('nama_lengkap')->findAll();
        $survei = $this->surveiModel->orderBy('kode_survei')->findAll();

        // LOGIC: If both are filtered OR both are empty, show both.
        // If only one is selected, show only that one.
        $hasHonorFilter = !empty($filter['bulan_pembayaran_honor']);
        $hasPulsaFilter = !empty($filter['bulan_pembayaran_pulsa']);

        $showHonor = true;
        $showPulsa = true;

        if ($hasHonorFilter && !$hasPulsaFilter) {
            $showPulsa = false;
        } elseif (!$hasHonorFilter && $hasPulsaFilter) {
            $showHonor = false;
        }

        $matrix = [];
        $rowTotal = [];
        $colTotal = [];
        $colHonorTotal = [];
        $colPulsaTotal = [];
        $grandTotal = 0;

        foreach ($mitra as $m) $rowTotal[$m['id']] = 0;
        foreach ($survei as $s) {
            $colTotal[$s['id']] = 0;
            $colHonorTotal[$s['id']] = 0;
            $colPulsaTotal[$s['id']] = 0;
        }

        foreach ($rows as $r) {
            $mId = $r['mitra_id'];
            $sId = $r['survei_id'];

            $hVal = $showHonor ? (int)$r['honor'] : 0;
            $pVal = $showPulsa ? (int)$r['pulsa'] : 0;
            $combined = $hVal + $pVal;

            $matrix[$mId][$sId][] = [
                'nama'  => $r['nama_kegiatan'],
                'honor' => $hVal,
                'pulsa' => $pVal
            ];

            $rowTotal[$mId] += $combined;
            $colTotal[$sId] += $combined;
            $colHonorTotal[$sId] += $hVal;
            $colPulsaTotal[$sId] += $pVal;
            $grandTotal += $combined;
        }

        return compact('mitra', 'survei', 'matrix', 'rowTotal', 'colTotal', 'colHonorTotal', 'colPulsaTotal', 'grandTotal');
    }
}
