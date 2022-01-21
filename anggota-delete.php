<?php
//Proses Delete
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $query_delete = mysqli_query($konek,"DELETE FROM anggota WHERE id_anggota = '$id'");
    
    if($query_delete){
        ?>
            <script>
                alert("Data Berhasil Di Delete");
            </script>
        <?php
        header('refresh:0; URL=http://localhost/perpustakaan/dashboard.php?page=anggota');
    }
}
////End of proses delete data/////////////////////////////////////////////////////////////////////////

?>