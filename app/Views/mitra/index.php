<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <div class="row align-items-center mb-4">
        <div class="col">
            <h4 class="fw-bold mb-0 text-dark">Data Mitra</h4>
            <p class="text-muted small mb-0">Mitra Kepka hasil Rekrutmen Mitra Statistik BPS 2026</p>
        </div>
        <div class="col-auto">
            <a href="/mitra/create" class="btn btn-primary px-4 shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Tambah Mitra
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
                            <th width="120">SOBAT ID</th>
                            <th>Nama Lengkap</th>
                            <th>Posisi</th>
                            <th width="150">Jenis Kelamin</th>
                            <th>Pekerjaan</th>
                            <th>Kontak & Email</th>
                            <th>Detail Bank</th>
                            <th class="text-end pe-4" width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($mitra)): ?>
                            <tr>
                                <td colspan="9" class="text-center py-5 text-muted">
                                    <i class="bi bi-people display-6 d-block mb-2"></i>
                                    Belum ada data mitra yang tersedia
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php $no = 1;
                        foreach ($mitra as $m): ?>
                            <tr>
                                <td class="ps-4 text-center text-muted"><?= $no++ ?></td>
                                <td>
                                    <span class="badge bg-light text-dark border fw-medium">
                                        <?= esc($m['sobat_id']) ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark"><?= esc($m['nama_lengkap']) ?></div>
                                    <div class="text-muted small" style="font-size: 0.75rem;">NIK: <?= esc($m['nik']) ?></div>
                                </td>
                                <td><span class="text-primary fw-medium"><?= esc($m['posisi']) ?></span></td>
                                <td>
                                    <i class="bi <?= $m['jk'] == 'Lk' ? 'bi-gender-male text-info' : 'bi-gender-female text-danger' ?> me-1"></i>
                                    <?= $m['jk'] == 'Lk' ? 'Laki-laki' : 'Perempuan' ?>
                                </td>
                                <td><?= esc($m['pekerjaan']) ?></td>
                                <td>
                                    <div class="small"><i class="bi bi-telephone me-1"></i> <?= esc($m['no_telp']) ?></div>
                                    <div class="small text-muted text-truncate" style="max-width: 250px;"><i class="bi bi-envelope me-1"></i> <?= esc($m['email']) ?></div>
                                </td>
                                <td>
                                    <div class="fw-medium text-dark"><?= esc($m['nama_bank']) ?></div>
                                    <div class="small text-muted"><?= esc($m['nomor_rekening']) ?></div>
                                    <div class="small text-secondary italic" style="font-size: 0.7rem;">
                                        an: <?= esc($m['rekening_nama']) ?>
                                    </div>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group shadow-sm" role="group">
                                        <a href="/mitra/edit/<?= $m['id'] ?>" class="btn btn-sm btn-outline-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="/mitra/delete/<?= $m['id'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Yakin hapus data mitra ini?')" title="Hapus">
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



<?= $this->endSection() ?>