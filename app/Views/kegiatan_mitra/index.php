<!DOCTYPE html>
<html>

<head>
    <title>Data Kegiatan Mitra</title>
</head>

<body>
    <h2>Data Kegiatan Mitra</h2>

    <a href="/kegiatan-mitra/create">+ Tambah Kegiatan Mitra</a>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;">
            <?= session()->getFlashdata('success') ?>
        </p>
    <?php endif; ?>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mitra</th>
                <th>Kode Survei</th>
                <th>Kegiatan</th>
                <th>Bulan Kegiatan</th>
                <th>Bulan Pembayaran Honor</th>
                <th>Bulan Pembayaran Pulsa</th>
                <th>Honor</th>
                <th>Pulsa</th>
                <td>Aksi</td>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($kegiatan_mitra)): ?>
                <tr>
                    <td colspan="6">Belum ada data</td>
                </tr>
            <?php endif; ?>

            <?php $no = 1;
            foreach ($kegiatan_mitra as $k): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $k['nama_lengkap'] ?></td>
                    <td><?= $k['kode_survei'] ?></td>
                    <td><?= $k['kegiatan'] ?></td>
                    <td><?= $k['bulan_kegiatan'] ?></td>
                    <td><?= $k['bulan_pembayaran_honor'] ?></td>
                    <td><?= $k['bulan_pembayaran_pulsa'] ?></td>
                    <td><?= $k['honor'] ?></td>
                    <td><?= $k['pulsa'] ?></td>
                    <td>
                        <a href="/kegiatan-mitra/edit/<?= $k['id'] ?>">Edit</a> |
                        <a href="/kegiatan-mitra/delete/<?= $k['id'] ?>"
                            onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>

    </table>

</body>

</html>