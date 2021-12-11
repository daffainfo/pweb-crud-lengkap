<?php
session_start();
include("config.php");

if($_SESSION["status_login_admin"] != "true") {
    header("Location: login.php?pesan=belum_login");
}

if( isset($_GET['id']) ){

    // ambil id dari query string
    $id = $_GET['id'];

    $sql = "SELECT * FROM calon_siswa WHERE id=$id";
    $query = mysqli_query($db, $sql);
    $siswa = mysqli_fetch_assoc($query);

    unlink("./images/".$siswa['file_name']);

    // buat query hapus
    $sql1 = "DELETE FROM calon_siswa WHERE id=$id";
    $query1 = mysqli_query($db, $sql1);

    // apakah query hapus berhasil?

    if( $query1){
        header('Location: dashboard.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>