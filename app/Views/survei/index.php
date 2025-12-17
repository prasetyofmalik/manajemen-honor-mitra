<!DOCTYPE html>
<html>

<head>
    <title>Data Survei</title>
</head>

<body>

    <h2>Data Survei</h2>

    <a href="/survei/create">+ Tambah Survei</a>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;">
            <?= session()->getFlashdata('success') ?>
        </p>
    <?php endif; ?>

    <table border="1" cellpadding="8" cellspacing="0">
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

</body>

</html>