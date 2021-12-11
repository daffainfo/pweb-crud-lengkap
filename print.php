<?php
session_start();
include("config.php");

if($_SESSION["status_login_admin"] != "true") {
    header("Location: login.php?pesan=belum_login");
}
// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: dashboard.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Print Siswa | SMK Coding</title>
    <meta charset="UTF-8">
    <meta name="author" content="Muhammad Daffa">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <header>
            <h3 class="text-center mt-5">Print Siswa</h3>
        </header>

        <p>Nama: <?php echo $siswa['nama'] ?></p>
        <p>Alamat: <?php echo $siswa['alamat'] ?></p>
        <p>Jenis Kelamin: <?php echo $siswa['jenis_kelamin'] ?></p>
        <p>Agama: <?php echo $siswa['agama'] ?></p>
        <p>Sekolah Asal: <?php echo $siswa['sekolah_asal'] ?></p>
        <img src="<?php echo "./images/".$siswa['file_name'] ?>">
    </div>
    <script>
		window.print();
	</script>
</body>
</html>