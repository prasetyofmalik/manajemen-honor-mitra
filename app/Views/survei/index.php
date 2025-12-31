<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid py-4">

    <div class="row align-items-center mb-4">
        <div class="col">
            <h4 class="fw-bold mb-0 text-dark">Data Survei</h4>
            <p class="text-muted small mb-0">Kelola daftar survei dan rincian kegiatan operasional</p>
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
                <table class="table table-hover align-middle mb-0" style="font-size: 0.875rem;">
                    <thead class="bg-light text-secondary text-uppercase small fw-bolder">
                        <tr>
                            <th class="ps-4 text-center" width="60">No</th>
                            <th width="140">Kode Survei</th>
                            <th>Nama Survei</th>
                            <th class="text-center" width="180">Total Kegiatan</th>
                            <th class="text-end pe-4" width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($survei)): ?>
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-folder2-open display-6 d-block mb-2 opacity-50"></i>
                                    Belum ada data survei yang tersedia
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($survei as $no => $s): ?>
                            <tr>
                                <td class="ps-4 text-center text-muted"><?= $no + 1 ?></td>
                                <td>
                                    <span class="badge bg-light text-dark border fw-medium px-2 py-1">
                                        <?= esc($s['kode_survei']) ?>
                                    </span>
                                </td>
                                <td>
                                    <div class="fw-bold text-dark"><?= esc($s['nama_survei']) ?></div>
                                </td>
                                <td class="text-center">
                                    <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary px-3 py-2 border border-primary border-opacity-10">
                                        <i class="bi bi-layers me-1"></i> <?= count($s['kegiatan'] ?? []) ?> Kegiatan
                                    </span>
                                </td>
                                <td class="text-end pe-4">
                                    <div class="btn-group shadow-sm" role="group">
                                        <button class="btn btn-sm btn-outline-primary"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#kegiatan-<?= $s['id'] ?>"
                                            title="Lihat Detail">
                                            <i class="bi bi-chevron-down"></i>
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
                                <td colspan="5" class="bg-light p-4 shadow-inner">
                                    <div class="card border-0 shadow-sm mx-3 overflow-hidden">
                                        <div class="card-header bg-white d-flex justify-content-between align-items-center py-3 border-bottom">
                                            <div class="d-flex align-items-center">
                                                <div class="bg-success bg-opacity-10 p-2 rounded-circle me-3">
                                                    <i class="bi bi-list-check text-success"></i>
                                                </div>
                                                <h6 class="mb-0 fw-bold text-dark">Daftar Kegiatan: <?= esc($s['nama_survei']) ?></h6>
                                            </div>
                                            <a href="/kegiatan/create?survei_id=<?= $s['id'] ?>" class="btn btn-sm btn-success px-3 rounded-pill shadow-sm">
                                                <i class="bi bi-plus-circle me-1"></i> Tambah Kegiatan
                                            </a>
                                        </div>
                                        <div class="card-body p-0">
                                            <?php if (empty($s['kegiatan'])): ?>
                                                <div class="p-4 text-center text-muted small">
                                                    <i class="bi bi-info-circle me-1"></i> Belum ada rincian kegiatan untuk survei ini.
                                                </div>
                                            <?php else: ?>
                                                <table class="table table-sm table-hover mb-0" style="font-size: 0.8rem;">
                                                    <thead class="table-light text-secondary text-uppercase" style="font-size: 0.7rem;">
                                                        <tr>
                                                            <th class="ps-4 py-2" width="50">#</th>
                                                            <th class="py-2">Nama Kegiatan</th>
                                                            <th class="py-2 text-center">Periode</th>
                                                            <th class="py-2">Satuan</th>
                                                            <th class="py-2 text-end">Harga Satuan</th>
                                                            <th class="py-2 text-center">Anggaran</th>
                                                            <th class="py-2 text-center" width="100">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($s['kegiatan'] as $i => $k): ?>
                                                            <tr class="align-middle">
                                                                <td class="ps-4 text-muted"><?= $i + 1 ?></td>
                                                                <td class="fw-bold text-dark"><?= esc($k['nama_kegiatan']) ?></td>
                                                                <td class="text-center text-nowrap">
                                                                    <span class="text-secondary"><?= esc($k['tanggal_mulai']) ?></span>
                                                                    <i class="bi bi-arrow-right mx-1 text-muted"></i>
                                                                    <span class="text-secondary"><?= esc($k['tanggal_selesai']) ?></span>
                                                                </td>
                                                                <td><span class="text-muted text-uppercase"><?= esc($k['satuan']) ?></span></td>
                                                                <td class="text-end fw-bold text-dark">
                                                                    Rp <?= number_format($k['harga_satuan'], 0, ',', '.') ?>
                                                                </td>
                                                                <td class="text-center">
                                                                    <span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-10">
                                                                        <?= esc($k['kode_beban_anggaran']) ?>
                                                                    </span>
                                                                </td>
                                                                <td class="text-center">
                                                                    <a href="/kegiatan/edit/<?= $k['id'] ?>" class="btn btn-link btn-sm text-warning p-0 mx-1">
                                                                        <i class="bi bi-pencil-square fs-6"></i>
                                                                    </a>
                                                                    <a href="/kegiatan/delete/<?= $k['id'] ?>" class="btn btn-link btn-sm text-danger p-0 mx-1" onclick="return confirm('Hapus kegiatan ini?')">
                                                                        <i class="bi bi-trash fs-6"></i>
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
    /* Consistent Styling with Mitra Index */
    .table thead th {
        font-size: 0.7rem;
        letter-spacing: 0.05em;
        border-top: none;
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .btn-group .btn {
        border-radius: 6px;
        margin: 0 2px;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(13, 110, 253, 0.02);
    }

    .shadow-inner {
        box-shadow: inset 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .card-header .btn-success {
        font-size: 0.75rem;
        font-weight: 500;
    }
</style>

<?= $this->endSection() ?>