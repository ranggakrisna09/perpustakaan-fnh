<?php
include('koneksi.php');
if (isset($_GET['save-edit'])) {
    $id             = $_GET['id'];
    $nis            = $_GET['nis'];
    $nama           = $_GET['nama'];
    $kelas          = $_GET['kelas'];
    $jurusan        = $_GET['jurusan'];
    $tanggal_lahir  = $_GET['tanggal_lahir'];
    $no_telp        = $_GET['no_telp'];
    $alamat         = $_GET['alamat'];
    $jenis_kelamin  = $_GET['jenis_kelamin'];

    $query_update = mysqli_query($konek,"UPDATE anggota 
    SET nis             = '$nis',
        nama            = '$nama',     
        kelas           = '$kelas',    
        jurusan         = '$jurusan',  
        tanggal_lahir   = '$tanggal_lahir',
        jenis_kelamin   = '$jenis_kelamin',       
        no_telp         = '$no_telp',     
        alamat          = '$alamat'
    WHERE id_anggota = '$id'");

    if ($query_update) {
        ?>
        <script>
            alert('Data Berhasil Diupdate')
            window.location.href='admin.php?page=anggota';
        </script>
        <?php
    }
}



if (isset($_GET['edit'])) 
{
    $id = $_GET['id'];
    $query= mysqli_query($konek,"SELECT * FROM anggota WHERE id_anggota = '$id'");

    foreach ($query as $row) 
    {
        ?>
        <div class="container">
            <center><h3>Edit Data Anggota</h3></center>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                    <form action="editanggota.php" method="get">
                        <input type="hidden" name="id" value="<?php echo $row['id_anggota'];?>">
                        <div class="form-group">
                            <input class="form-control" type="text" name="nis" value="<?php echo $row['nis'];?>" placeholder="Nomor Induk Siswa" required>
                        </div>
                        <div class="form-group mt-2">
                            <input class="form-control" type="text" name="nama" value="<?php echo $row['nama'];?>" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group mt-2">
                            <select class="form-control" name="kelas" required>
                                <option value="<?php echo $row['kelas'];?>"><?php echo $row['kelas'];?></option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <select class="form-control" name="jurusan" required>
                                <option value="<?php echo $row['jurusan'];?>"><?php echo $row['jurusan'];?></option>
                                <option value="RPL">Rekayasa Perangkat Lunak</option>
                                <option value="TAV">Teknik Audio Video</option>
                                <option value="TKR">Teknik Kendaraan Ringan</option>
                                <option value="TITL">Teknik Instalasi Tenaga Listrik</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <input class="form-control" type="date" name="tanggal_lahir" value="<?php echo $row['tanggal_lahir'];?>">
                        </div>
                        <div class="form-group mt-2">
                            <select class="form-control" name="jenis_kelamin">
                                <option value="<?php echo $row['jenis_kelamin'];?>"><?php echo $row['jenis_kelamin'];?></option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <input class="form-control" type="text" name="no_telp" value="<?php echo $row['no_telp'];?>" placeholder="Nomor Telepon">
                        </div>
                        <div class="form-group mt-2">
                            <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap">
                            <?php echo $row['alamat'];?>
                            </textarea>
                        </div>
                        <div class="form-group mt-2">
                            <center>
                                <button name="save-edit" class="btn btn-primary mb-3" type="submit">
                                    Save Edit
                                </button>
                            </center>
                        </div>
                    </form>
                </div>
                <div class="col-4"></div>
            </div>
        </div>
        <?php
    }
}
?>