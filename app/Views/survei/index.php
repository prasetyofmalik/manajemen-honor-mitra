<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <div class="row align-items-center mb-4">
        <div class="col">
            <h4 class="fw-bold mb-0 text-dark">Data Survei</h4>
            <p class="text-muted small mb-0">Kelola daftar survei dan rincian kegiatan</p>
        </div>
        <div class="col-auto">
            <a href="/survei/create" class="btn btn-primary px-4 shadow-sm">
                <i class="bi bi-plus-lg me-1"></i> Tambah Survei
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light text-secondary text-uppercase small fw-bolder">
                        <tr>
                            <th class="ps-4" width="60">No</th>
                            <th width="120">Kode</th>
                            <th>Nama Survei</th>
                            <th class="text-center" width="180">Total Kegiatan</th>
                            <th class="text-end pe-4" width="220">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($survei)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-folder2-open display-6 d-block mb-2"></i>
                                    Belum ada data survei
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($survei as $no => $s): ?>
                            <tr>
                                <td class="ps-4 text-muted"><?= $no + 1 ?></td>
                                <td><span class="badge bg-light text-dark border fw-medium"><?= esc($s['kode_survei']) ?></span></td>
                                <td class="fw-medium text-dark"><?= esc($s['nama_survei']) ?></td>
                                <td class="text-center">
                                    <span class="badge rounded-pill bg-info-subtle text-info px-3">
                                        <?= count($s['kegiatan'] ?? []) ?> Kegiatan
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group shadow-sm" role="group">
                                        <button class="btn btn-sm btn-outline-primary"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#kegiatan-<?= $s['id'] ?>"
                                            title="Lihat Detail">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                        <a href="/survei/edit/<?= $s['id'] ?>" class="btn btn-sm btn-outline-warning" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="/survei/delete/<?= $s['id'] ?>"
                                            class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('Hapus survei ini?')" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>

                            <tr class="collapse" id="kegiatan-<?= $s['id'] ?>">
                                <td colspan="5" class="bg-light p-4">
                                    <div class="card border-0 shadow-sm mx-3">
                                        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3">
                                            <h6 class="mb-0 fw-bold text-primary">Rincian Kegiatan: <?= esc($s['nama_survei']) ?></h6>
                                            <a href="/kegiatan/create?survei_id=<?= $s['id'] ?>" class="btn btn-sm btn-success px-3">
                                                <i class="bi bi-plus-circle me-1"></i> Tambah Kegiatan
                                            </a>
                                        </div>
                                        <div class="card-body p-0">
                                            <?php if (empty($s['kegiatan'])): ?>
                                                <div class="p-4 text-center text-muted small italic">
                                                    Tidak ada kegiatan yang terdaftar.
                                                </div>
                                            <?php else: ?>
                                                <table class="table table-sm table-borderless mb-0">
                                                    <thead class="table-light border-bottom small text-muted">
                                                        <tr>
                                                            <th class="ps-3" width="50">#</th>
                                                            <th>Nama Kegiatan</th>
                                                            <th class="text-center">Periode</th>
                                                            <th>Satuan</th>
                                                            <th class="text-end">Harga Satuan</th>
                                                            <th class="text-center">Beban Anggaran</th>
                                                            <th class="text-center" width="80">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="small">
                                                        <?php foreach ($s['kegiatan'] as $i => $k): ?>
                                                            <tr class="border-bottom">
                                                                <td class="ps-3 text-muted"><?= $i + 1 ?></td>
                                                                <td class="fw-bold"><?= esc($k['nama_kegiatan']) ?></td>
                                                                <td class="text-center">
                                                                    <?= esc($k['tanggal_mulai']) ?> <span class="text-muted">s/d</span> <?= esc($k['tanggal_selesai']) ?>
                                                                </td>
                                                                <td><?= esc($k['satuan']) ?></td>
                                                                <td class="text-end fw-medium text-dark">
                                                                    Rp<?= number_format($k['harga_satuan'], 0, ',', '.') ?>
                                                                </td>
                                                                <td class="text-center text-uppercase"><?= esc($k['kode_beban_anggaran']) ?></td>
                                                                <td class="text-center">
                                                                    <a href="/kegiatan/edit/<?= $k['id'] ?>" class="link-warning mx-1">
                                                                        <i class="bi bi-pencil-square"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            <?php endif; ?>
                                        </div>
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
    /* Subtle touch-ups */
    .table thead th {
        font-size: 0.75rem;
        letter-spacing: 0.05em;
        border-top: none;
    }

    .btn-group .btn {
        border-radius: 6px;
        margin: 0 2px;
    }

    .collapse.show {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .badge-info-subtle {
        background-color: #e0f7fa;
        color: #00acc1;
    }
</style>

<?= $this->endSection() ?>