<?php
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $query_delete = mysqli_query($konek, "DELETE FROM anggota where id_anggota = '$id' ");

    if($query_delete){
        ?>
            <script>
                alert("Data Berhasil Dihapus");
            </script>
        <?php
        header('location:http://localhost/perpustakaan/admin.php?page=anggota');
    }
}

    if ($query_delete) {
        ?>

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        DATA BERHASIL DIHAPUS !!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }else {
        ?>

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
        DATA GAGAL DIHAPUS !!
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
    }
?>