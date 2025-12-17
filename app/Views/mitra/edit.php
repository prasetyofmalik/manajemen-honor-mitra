<!DOCTYPE html>
<html>

<head>
    <title>Edit Mitra</title>
</head>

<body>

    <h2>Edit Mitra</h2>

    <form action="/mitra/update/<?= $mitra['id'] ?>" method="post">
        <?= csrf_field() ?>

        <p>
            <label>SOBAT ID:</label><br>
            <input type="text" name="sobat_id" value="<?= esc($mitra['sobat_id']) ?>" required>
        </p>
        <p>
            <label>Nama Lengkap:</label><br>
            <input type="text" name="nama_lengkap" value="<?= esc($mitra['nama_lengkap']) ?>" required>
        </p>
        <p>
            <label>Posisi:</label><br>
            <input type="text" name="posisi" value="<?= esc($mitra['posisi']) ?>" required>
        </p>
        <p>
            <label>Alamat:</label><br>
            <input type="text" name="alamat" value="<?= esc($mitra['alamat']) ?>" required>
        </p>
        <p>
            <label>Jenis Kelamin:</label><br>
            <input type="text" name="jk" value="<?= esc($mitra['jk']) ?>" required>
        </p>
        <p>
            <label>Pendidikan:</label><br>
            <input type="text" name="pendidikan" value="<?= esc($mitra['pendidikan']) ?>" required>
        </p>
        <p>
            <label>Pekerjaan:</label><br>
            <input type="text" name="pekerjaan" value="<?= esc($mitra['pekerjaan']) ?>" required>
        </p>
        <p>
            <label>No Telpon:</label><br>
            <input type="text" name="no_telp" value="<?= esc($mitra['no_telp']) ?>" required>
        </p>
        <p>
            <label>Email:</label><br>
            <input type="email" name="email" value="<?= esc($mitra['email']) ?>" required>
        </p>
        <p>
            <label>NIK:</label><br>
            <input type="text" name="nik" value="<?= esc($mitra['nik']) ?>" required>
        </p>
        <p>
            <label>Nama Bank:</label><br>
            <input type="text" name="nama_bank" value="<?= esc($mitra['nama_bank']) ?>" required>
        </p>
        <p>
            <label>No Rekening:</label><br>
            <input type="text" name="nomor_rekening" value="<?= esc($mitra['nomor_rekening']) ?>" required>
        </p>
        <p>
            <label>Atas Nama:</label><br>
            <input type="text" name="rekening_nama" value="<?= esc($mitra['rekening_nama']) ?>" required>
        </p>

        <button type="submit">Update</button>
        <a href="/mitra">Kembali</a>
    </form>

</body>

</html>