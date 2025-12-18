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
                <table class="table table-bordered table-striped table-hover mb-0">
                    <thead class="table-light text-center align-middle">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Survei</th>
                            <th>Kegiatan</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Satuan</th>
                            <th>Harga Satuan</th>
                            <th>Kode Beban Anggaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($survei)): ?>
                            <tr>
                                <td colspan="13" class="text-center text-muted py-4">
                                    Belum ada data survei
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php $no = 1;
                        foreach ($survei as $s): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= esc($s['kode_survei']) ?></td>
                                <td><?= esc($s['nama_survei']) ?></td>
                                <td><?= esc($s['kegiatan']) ?></td>
                                <td><?= esc($s['tanggal_mulai']) ?></td>
                                <td><?= esc($s['tanggal_selesai']) ?></td>
                                <td class="text-center">
                                    <?= $s['satuan'] == 'DOK' ? 'Dokumen' : ($s['satuan'] == 'O-B' ? 'O-B' : ($s['satuan'] == 'BS' ? 'BS' : ($s['satuan'] == 'RUTA' ? 'Ruta' : ($s['satuan'] == 'EA' ? 'EA' : ($s['satuan'] == 'SGMN' ? 'Segmen' : $s['satuan']))))) ?>
                                </td>
                                <td><?= esc($s['harga_satuan']) ?></td>
                                <td><?= esc($s['kode_beban_anggaran']) ?></td>
                                <td class="text-center">
                                    <a href="/survei/edit/<?= $s['id'] ?>"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="/survei/delete/<?= $s['id'] ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin hapus data survei ini?')">
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