<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <div class="row align-items-center mb-4">
        <div class="col">
            <h4 class="fw-bold mb-0 text-dark">Data Kegiatan Mitra</h4>
            <p class="text-muted small mb-0">Monitoring honor dan distribusi pulsa untuk setiap kegiatan mitra</p>
        </div>
        <div class="col-auto">
            <a href="/kegiatan-mitra/create" class="btn btn-primary px-4 shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Input Kegiatan Mitra
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" style="font-size: 0.875rem;">
                    <thead class="bg-light text-secondary text-uppercase small fw-bolder">
                        <tr>
                            <th class="ps-4 text-center" width="50">No</th>
                            <th>Nama Mitra</th>
                            <th class="text-center">Survei & Kegiatan</th>
                            <th class="text-center">Periode Kegiatan</th>
                            <th class="text-center">Periode Bayar</th>
                            <th class="text-end">Honor (Rp)</th>
                            <th class="text-end">Pulsa (Rp)</th>
                            <th class="text-end pe-4" width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Month mapping array
                        $months = [
                            '01' => 'Januari',
                            '02' => 'Februari',
                            '03' => 'Maret',
                            '04' => 'April',
                            '05' => 'Mei',
                            '06' => 'Juni',
                            '07' => 'Juli',
                            '08' => 'Agustus',
                            '09' => 'September',
                            '10' => 'Oktober',
                            '11' => 'November',
                            '12' => 'Desember'
                        ];

                        // Helper function to convert "01", "1", or "2023-01" to "Januari"
                        $formatMonth = function ($val) use ($months) {
                            if (empty($val)) return '-';
                            // Extract last 2 digits if it's a date string like '2023-01'
                            $key = str_pad(substr($val, -2), 2, '0', STR_PAD_LEFT);
                            return $months[$key] ?? $val;
                        };
                        ?>
                        <?php if (empty($kegiatan_mitra)): ?>
                            <tr>
                                <td colspan="8" class="text-center py-5 text-muted">
                                    <i class="bi bi-calendar-x display-6 d-block mb-2"></i>
                                    Belum ada data kegiatan mitra yang tercatat
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php $no = 1;
                        foreach ($kegiatan_mitra as $k): ?>
                            <tr>
                                <td class="ps-4 text-center text-muted"><?= $no++ ?></td>
                                <td>
                                    <div class="fw-bold text-dark"><?= esc($k['nama_lengkap']) ?></div>
                                    <div class="text-muted small" style="font-size: 0.75rem;"><?= esc($k['jabatan']) ?></div>
                                </td>
                                <td>
                                    <div class="text-center">
                                        <span class="badge bg-primary-subtle text-primary border border-primary-subtle px-2 mb-1">
                                            <?= esc($k['kode_survei']) ?>
                                        </span>
                                        <div class="small fw-medium text-secondary"><?= esc($k['nama_kegiatan']) ?></div>
                                    </div>
                                </td>
                                <td class="text-center">
                                    <span class="text-dark fw-medium"><?= $formatMonth($k['bulan_kegiatan']) ?></span>
                                </td>
                                <td class="text-center">
                                    <div class="small text-muted">
                                        Honor: <span class="text-dark fw-medium"><?= $formatMonth($k['bulan_pembayaran_honor']) ?></span>
                                    </div>
                                    <div class="small text-muted">
                                        Pulsa: <span class="text-dark fw-medium"><?= $formatMonth($k['bulan_pembayaran_pulsa']) ?></span>
                                    </div>
                                </td>
                                <td class="text-end fw-bold text-dark">
                                    <?= number_format($k['honor'], 0, ',', '.') ?>
                                </td>
                                <td class="text-end fw-bold text-success">
                                    <?= number_format($k['pulsa'], 0, ',', '.') ?>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group shadow-sm" role="group">
                                        <a href="/kegiatan-mitra/edit/<?= $k['id'] ?>" class="btn btn-sm btn-outline-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="/kegiatan-mitra/delete/<?= $k['id'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Yakin hapus data kegiatan mitra ini?')" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    /* Global table refinements */
    .table thead th {
        font-size: 0.7rem;
        letter-spacing: 0.05em;
        border-top: none;
    }

    .btn-group .btn {
        border-radius: 6px;
        margin: 0 2px;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(13, 110, 253, 0.02);
    }

    .badge {
        font-weight: 600;
        letter-spacing: 0.02em;
    }
</style>

<?= $this->endSection() ?>