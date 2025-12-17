<!DOCTYPE html>
<html>

<head>
    <title>Data Mitra</title>
</head>

<body>

    <h2>Daftar Mitra</h2>

    <a href="/mitra/create">+ Tambah Mitra</a>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;">
            <?= session()->getFlashdata('success') ?>
        </p>
    <?php endif; ?>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
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
                    <td colspan="6">Belum ada data</td>
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
                    <td><?= esc($m['jk']) ?></td>
                    <td><?= esc($m['pendidikan']) ?></td>
                    <td><?= esc($m['pekerjaan']) ?></td>
                    <td><?= esc($m['no_telp']) ?></td>
                    <td><?= esc($m['email']) ?></td>
                    <td><?= esc($m['nik']) ?></td>
                    <td><?= esc($m['nama_bank']) ?></td>
                    <td><?= esc($m['nomor_rekening']) ?></td>
                    <td><?= esc($m['rekening_nama']) ?></td>
                    <td>
                        <a href="/mitra/edit/<?= $m['id'] ?>">Edit</a> |
                        <a href="/mitra/delete/<?= $m['id'] ?>"
                            onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>

</html>