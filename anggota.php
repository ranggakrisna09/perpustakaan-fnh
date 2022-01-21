<?php
   
    //Insert Data
    if (isset($_POST['save'])){
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jurusan = $_POST['jurusan'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $nomor_telepon = $_POST['nomor_telepon'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['jk'];

        //query untuk menginputkan data ke database berdasarkan variable diatas
        $query_insert = mysqli_query($konek, "INSERT INTO anggota
        VALUES('','$nis','$nama','$kelas','$jurusan','$tanggal_lahir','$nomor_telepon','$alamat','$jk')");

        if ($query_insert) {
            ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            DATA ANGGOTA BARU BERHASIL DISIMPAN !!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }else {
            ?>

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            DATA GAGAL DISIMPAN !!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
        }
    }
    //AKHIR INSERT DATA
?>


<center><h1 class="mt-4 mb-3">Data Anggota</h1></center>
<br>
<br>
<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#tambahanggota">
   Tambah Data
</button>
<table class="table table-light table-striped">
    <tr align="center">
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Gender</th>
        <th>Tgl Lahir</th>
        <th>Kelas</th>
        <th>Jurusan</td>
        <th>No. Tlp</th>
        <th>Alamat</th>
        <th>--Action--</th>
    </tr>
    <?php
        $query = mysqli_query($konek,"SELECT * FROM anggota");
        $no = 1;
        foreach ($query as $row) {
    ?>
    <tr align ="center">
        <td align="center" valign="middle"><?php echo $no; ?></td>
        <td valign="middle"><?php echo $row['nis']; ?></td>
        <td valign="middle"><?php echo $row['nama']; ?></td>
        <td align="center" valign="middle"><?php echo $row['jenis_kelamin']=="L"?"Laki-laki":"Perempuan"; ?></td>

        <td valign="middle"><?php echo $row['tanggal_lahir']; ?></td>
        
        <td valign="middle">
            <?php 
                $idkelas = $row['id_kelas']; 
                $query_kelas = mysqli_query($konek, "SELECT * FROM kelas WHERE id_kelas = '$idkelas'");
                foreach ($query_kelas as $kelas) {
                    echo $kelas['nama_kelas'];
                }
            ?>
        </td>

        <td valign="middle">
            <?php 
                $jurusan = $row['id_jurusan']; 
                $query_jurusan = mysqli_query($konek, "SELECT * FROM jurusan WHERE id_jurusan = '$jurusan'");
                foreach ($query_jurusan as $kelas) {
                    echo $jurusan['nama_jurusan'];
                }
             ?>
        </td>


        <td valign="middle"><?php echo $row['no_telp']; ?></td>
        <td valign="middle">
            <?php 
            if (strlen($row['alamat'])>=40)
            {
                echo substr($row['alamat'],0,40)."...";
            }
            else {
                echo $row['alamat'];
            }
            ?>
        </td>
        <td align="center" valign="middle"><?php echo $row['jenis_kelamin']; ?></td>
        <td valign="middle">
            <a href="?page=deleteanggota&delete=&id=<?php echo $row['id_anggota']; ?>">
                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </a>
            <a href="?page=editanggota&edit=&id=<?php echo $row['id_anggota']; ?>">
                <button class="btn btn-warning"><i class="fas fa-edit"></i></button>
            </a>
        </td>
    </tr>
    <?php
    $no++;
    }
    ?>
</table>

<!-- Modal -->
<div class="modal fade" id="tambahanggota" tabindex="-1" aria-labelledby="tambahanggotaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="tambahanggotaLabel">Form Tambah Anggota</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="nis" placeholder="Nomor Induk Siswa">
                </div><br>
                <div class="form-group">
                    <input class="form-control" type="text" name="nama" placeholder="Nama Lengkap">
                </div><br>
                <div class="form-group">
                Kelas: <br><select name="kelas" id="kelas">
                    <option value="">--Pilih Kelas--</option>
                    <option value="X">X</option>
                    <option value="XI">XI</option>
                    <option value="XII">XII</option>
                </select>
                </div><br>
                <div class="form-group">
                Jurusan: <br><select name="jurusan">
                    <option value="RPL">Rekayasa Perangkat Lunak</option>
                    <option value="TAV">Teknik Audio Video</option>
                    <option value="TKR">Teknik Kendaraan Ringan</option>
                    <option value="TITL">Teknik Instalasi Tenaga Listrik</option>
                </select>
                </div><br>
                <div class="form-group">
                Tanggal Lahir: <br><input type="date" name="tanggal_lahir" placeholder="Tanggal Lahir">
                </div><br>
                <div class="form-group">
                    <input class="form-control" type="text" name="nomor_telepon" placeholder="No Telpon">
                </div><br>
                <div class="form-group">
                   <textarea name="alamat" cols="30" rows="10" placeholder="Alamat"></textarea>
                </div><br>
                <div class="form-group">
                Jenis Kelamin: <br><select name="jk">
                    <option value="">--Pilih Jenis Kelamin--</option>
                    <option value="L">Laki-laki</option>
                    <option value="p">Perempuan</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="Submit" name="save" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>

