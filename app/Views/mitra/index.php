<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Data Mitra</h4>
        <a href="/mitra/create" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Mitra
        </a>
    </div>

    <div class="card shadow-sm">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover mb-0">
                    <thead class="table-light text-center align-middle">
                        <tr>
                            <th>No</th>
                            <th>SOBAT ID</th>
                            <th>Nama Lengkap</th>
                            <th>Posisi</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Pendidikan</th>
                            <th>Pekerjaan</th>
                            <th>No Telpon</th>
                            <th>Email</th>
                            <th>NIK</th>
                            <th>Bank</th>
                            <th>No Rekening</th>
                            <th>Atas Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($mitra)): ?>
                            <tr>
                                <td colspan="13" class="text-center text-muted py-4">
                                    Belum ada data mitra
                                </td>
                            </tr>
                        <?php endif; ?>

                        <?php $no = 1;
                        foreach ($mitra as $m): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= esc($m['sobat_id']) ?></td>
                                <td><?= esc($m['nama_lengkap']) ?></td>
                                <td><?= esc($m['posisi']) ?></td>
                                <td><?= esc($m['alamat']) ?></td>
                                <td class="text-center">
                                    <?= $m['jk'] == 'Lk' ? 'Laki-laki' : 'Perempuan' ?>
                                </td>
                                <td><?= esc($m['pendidikan']) ?></td>
                                <td><?= esc($m['pekerjaan']) ?></td>
                                <td><?= esc($m['no_telp']) ?></td>
                                <td><?= esc($m['email']) ?></td>
                                <td><?= esc($m['nik']) ?></td>
                                <td><?= esc($m['nama_bank']) ?></td>
                                <td><?= esc($m['nomor_rekening']) ?></td>
                                <td><?= esc($m['rekening_nama']) ?></td>
                                <td class="text-center">
                                    <a href="/mitra/edit/<?= $m['id'] ?>"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="/mitra/delete/<?= $m['id'] ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin hapus data mitra ini?')">
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