<?= $this->extend('layout/admin') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between mb-3">
    <h4>Data Survei</h4>
    <a href="/survei/create" class="btn btn-primary">+ Tambah Survei</a>
</div>

<table class="table table-bordered table-striped">
    <thead>
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
                <td colspan="6">Belum ada data</td>
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
                <td><?= esc($s['satuan']) ?></td>
                <td><?= esc($s['harga_satuan']) ?></td>
                <td><?= esc($s['kode_beban_anggaran']) ?></td>
                <td>
                    <a href="/survei/edit/<?= $s['id'] ?>">Edit</a> |
                    <a href="/survei/delete/<?= $s['id'] ?>"
                        onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>