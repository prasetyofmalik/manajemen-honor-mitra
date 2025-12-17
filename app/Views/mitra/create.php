<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mitra</title>
</head>
<body>

<h2>Tambah Mitra</h2>

<form action="/mitra/store" method="post">
    <?= csrf_field() ?>

    <p>
        <label>SOBAT ID</label><br>
        <input type="text" name="sobat_id" required>
    </p>

    <p>
        <label>Nama Lengkap</label><br>
        <input type="text" name="nama_lengkap" required>
    </p>
    
    <p>
        <label>Posisi</label><br>
        <input type="text" name="posisi" required>
    </p>

    <p>
        <label>Alamat</label><br>
        <textarea name="alamat"></textarea>
    </p>

    <p>
        <label>Jenis Kelamin</label><br>
        <input type="text" name="jk" required>
    </p>
    <p>
        <label>Pendidikan</label><br>
        <input type="text" name="pendidikan" required>
    </p>
    <p>
        <label>Pekerjaan</label><br>
        <input type="text" name="pekerjaan" required>
    </p>
    <p>
        <label>No Telpon</label><br>
        <input type="text" name="no_telp" required>
    </p>
    <p>
        <label>Email</label><br>
        <input type="text" name="email" required>
    </p>
    <p>
        <label>NIK</label><br>
        <input type="text" name="nik" required>
    </p>

    <p>
        <label>Nama Bank</label><br>
        <input type="text" name="nama_bank">
    </p>

    <p>
        <label>Nomor Rekening</label><br>
        <input type="text" name="nomor_rekening">
    </p>

    <p>
        <label>Atas Nama</label><br>
        <input type="text" name="rekening_nama">
    </p>

    <button type="submit">Simpan</button>
    <a href="/mitra">Kembali</a>
</form>

</body>
</html>
