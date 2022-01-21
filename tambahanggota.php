<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Anggota</title>
</head>
<body>
    <div class="content-utama">
        <h1>Tambah Anggota</h1>
        <form id="tambahanggota" class="tambahanggota" action="" method="post">
            <div>
                <label for="id_anggota">Id_Anggota</label>
                <input type="number" name="id_anggota" id="id_anggota" placeholder="id_anggota" required>
            </div>

            <div>
                <label for="nis">NIS</label>
                <input type="number" name="nis" id="nis" placeholder="NIS" required>
            </div>

            <div>
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" placeholder="Nama Lengkap">
            </div>

            <div>
                <label for="kelas">Kelas</label>
                <select name="kelas" id="kelas">
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
            </div>

            <div>
                <label for="jurusan">Jurusan</label>
                <select name="jurusan" id="jurusan">
                    <option value="TKR">Teknik Kendaraan Ringan</option>
                    <option value="TAV">Teknnik Audio Video</option>
                    <option value="TTL">Teknik Tenaga Listrik</option>
                    <option value="RPL">Rekayasa Perangkat Lunak</option>
                </select>
            </div>

            <div>
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir">
            </div>

            <div>
                <label for="nomor_telepon">No Telepon</label>
                <input type="text" name="nomor_telepon" id="nomor_telepon" placeholder="No Telepon">
            </div>

            <div>
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" cols="30" rows="10" placeholder="Alamat Lengkap"></textarea>
            </div>

            <div>
                <label for="jk">Jenis Kelamin</label>
                <select name="jk" id="jk">
                    <option value="L">Laki - laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>

            <div>
                <input type="submit" value="Simpan" name="simpan">
            </div>
        </form>
    </div>
</body>
</html>

<?php
    //cek jika tombol submit telah di tekan
    if(isset($_POST['simpan'])){
        $query=mysqli_query($konek,'insert into anggota values("'.$_POST['nis'].'","'.$_POST['nama'].'","'.$_POST['kelas'].'","'.$_POST['jurusan'].'","'.$_POST['tanggal_lahir'].'","'.$_POST['nomor_telepon'].'","'.$_POST['alamat'].'","'.$_POST['jk'].'")');

        //arahkan halaman jika berhasil menambahkan data ke halamaan anggota
        if($query) header('location:anggota.php');
    }
?>