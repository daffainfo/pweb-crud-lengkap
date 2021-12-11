<?php
session_start();
include("config.php");

if($_SESSION["status_login_admin"] != "true") {
    header("Location: login.php?pesan=belum_login");
}

$targetDir = "images/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // buat query update
            $sql = "SELECT * FROM calon_siswa WHERE id=$id";
            $query = mysqli_query($db, $sql);
            $siswa = mysqli_fetch_assoc($query);
        
            unlink("./images/".$siswa['file_name']);

            $sql1 = "UPDATE calon_siswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', agama='$agama', sekolah_asal='$sekolah', file_name='$fileName' WHERE id=$id";
            $query1 = mysqli_query($db, $sql1);

            // apakah query update berhasil?
            if( $query1 ) {
                // kalau berhasil alihkan ke halaman dashboard.php
                header('Location: dashboard.php');
            } else {
                // kalau gagal tampilkan pesan
                die("Gagal menyimpan perubahan...");
            }
        }else{
            echo "Sorry, there was an error uploading your file.";
        }
    }else{
        echo 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }


} else {
    die("Akses dilarang...");
}

?>