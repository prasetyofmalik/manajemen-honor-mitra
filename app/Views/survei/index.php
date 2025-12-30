<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Data Survei</h4>
        <a href="/survei/create" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Survei
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-bordered table-hover mb-0">
                    <thead class="table-light text-center align-middle">
                        <tr>
                            <th width="50">No</th>
                            <th>Kode</th>
                            <th>Nama Survei</th>
                            <th width="150">Jumlah Kegiatan</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php if (empty($survei)): ?>
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    Belum ada data survei
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php foreach ($survei as $no => $s): ?>
                            <tr>
                                <td class="text-center"><?= $no + 1 ?></td>
                                <td><?= esc($s['kode_survei']) ?></td>
                                <td><?= esc($s['nama_survei']) ?></td>
                                <td class="text-center">
                                    <span class="badge bg-secondary">
                                        <?= count($s['kegiatan'] ?? []) ?>
                                    </span>
                                </td>
                                <td class="text-center">

                                    <button class="btn btn-sm btn-info"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#kegiatan-<?= $s['id'] ?>">
                                        <i class="bi bi-list-task"></i> Kegiatan
                                    </button>

                                    <a href="/survei/edit/<?= $s['id'] ?>"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>

                                    <a href="/survei/delete/<?= $s['id'] ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin hapus survei ini?')">
                                        <i class="bi bi-trash"></i>
                                    </a>

                                </td>
                            </tr>

                            <!-- ROW NESTED KEGIATAN -->
                            <tr class="collapse bg-light"
                                id="kegiatan-<?= $s['id'] ?>">
                                <td colspan="5">

                                    <div class="d-flex justify-content-between mb-2">
                                        <strong>Daftar Kegiatan</strong>
                                        <a href="/kegiatan/create?survei_id=<?= $s['id'] ?>"
                                            class="btn btn-sm btn-primary">
                                            <i class="bi bi-plus-lg"></i> Tambah Kegiatan
                                        </a>
                                    </div>

                                    <?php if (empty($s['kegiatan'])): ?>
                                        <p class="text-muted mb-0">
                                            Belum ada kegiatan untuk survei ini.
                                        </p>
                                    <?php else: ?>
                                        <table class="table table-sm table-bordered mb-0">
                                            <thead class="table-secondary text-center">
                                                <tr>
                                                    <th width="50">No</th>
                                                    <th>Nama Kegiatan</th>
                                                    <th>Tanggal</th>
                                                    <th>Satuan</th>
                                                    <th>Harga Satuan</th>
                                                    <th>Kode Beban Anggaran</th>
                                                    <th width="120">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($s['kegiatan'] as $i => $k): ?>
                                                    <tr>
                                                        <td class="text-center"><?= $i + 1 ?></td>
                                                        <td><?= esc($k['nama_kegiatan']) ?></td>
                                                        <td class="text-center">
                                                            <?= esc($k['tanggal_mulai']) ?>
                                                            -
                                                            <?= esc($k['tanggal_selesai']) ?>
                                                        </td>
                                                        <td><?= esc($k['satuan']) ?></td>
                                                        <td><?= esc($k['harga_satuan']) ?></td>
                                                        <td><?= esc($k['kode_beban_anggaran']) ?></td>
                                                        <td class="text-center">
                                                            <a href="/kegiatan/edit/<?= $k['id'] ?>"
                                                                class="btn btn-sm btn-warning">
                                                                <i class="bi bi-pencil"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    <?php endif; ?>

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