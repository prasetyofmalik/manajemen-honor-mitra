<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Data Kegiatan Mitra</h4>
        <a href="/kegiatan-mitra/create" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Input Kegiatan Mitra
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover mb-0">
                    <thead class="table-light text-center align-middle">
                        <tr>
                            <th>No</th>
                            <th>Nama Mitra</th>
                            <th>Kode Survei</th>
                            <th>Kegiatan</th>
                            <th>Bulan Kegiatan</th>
                            <th>Bulan Bayar Honor</th>
                            <th>Bulan Bayar Pulsa</th>
                            <th>Honor</th>
                            <th>Pulsa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (empty($kegiatan_mitra)): ?>
                            <tr>
                                <td colspan="10" class="text-center text-muted py-4">
                                    Belum ada data kegiatan mitra
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php $no = 1;
                        foreach ($kegiatan_mitra as $k): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= esc($k['nama_lengkap']) ?></td>
                                <td class="text-center"><?= esc($k['kode_survei']) ?></td>
                                <td><?= esc($k['kegiatan']) ?></td>
                                <td class="text-center"><?= esc($k['bulan_kegiatan']) ?></td>
                                <td class="text-center"><?= esc($k['bulan_pembayaran_honor']) ?></td>
                                <td class="text-center"><?= esc($k['bulan_pembayaran_pulsa']) ?></td>
                                <td class="text-end">
                                    <?= number_format($k['honor'], 0, ',', '.') ?>
                                </td>
                                <td class="text-end">
                                    <?= number_format($k['pulsa'], 0, ',', '.') ?>
                                </td>
                                <td class="text-center">
                                    <a href="/kegiatan-mitra/edit/<?= $k['id'] ?>"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="/kegiatan-mitra/delete/<?= $k['id'] ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin hapus data kegiatan mitra ini?')">
                                        <i class="bi bi-trash"></i>
                                    </a>
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