<!-- Muhammad Daffa ~ daffa.tech-->
<!DOCTYPE html>
<html>
<head>
	<title>SMK Coding</title>
    <meta charset="UTF-8">
    <meta name="author" content="Muhammad Daffa">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<style type="text/css">
		html, 
        body { 
            height: 100%; 
            background-image: url("https://wallpapercave.com/wp/wp3377140.jpg");
            background-position: center;
  			background-repeat: no-repeat;
  			background-size: cover;
        }
		.mid-center { 
            top: 50%; 
            left: 50%; 
            transform: translateX(-50%) translateY(-50%); 
        }
        
        h1 {
            color: rgba(255, 255, 255, 0.7);
            font-size: 4em;
        }
        .notifikasi {
            color: rgba(255, 255, 255, 0.5);
        }
        footer {
            margin-top: 250px;
            color: rgba(255, 255, 255, 0.8);
        }
	</style>
</head>
<body>
	<div class="position-relative h-100">	
		<div class="position-absolute mid-center">
		    <h1>SMK Coding</h1>
            <a class="btn btn-primary btn-lg btn-block" href="form-daftar.php">Daftar Baru</a>
            <a class="btn btn-primary btn-lg btn-block" href="login.php">Login Admin</a>
            <?php if(isset($_GET['status'])): ?>
        <p>
            <?php
                if($_GET['status'] == 'sukses'){
                    echo "<p class='text-center notifikasi'>Pendaftaran siswa baru berhasil!</p>";
                } else {
                    echo "<p class='text-center notifikasi'>Pendaftaran gagal!</p>";
                }
            ?>
        </p>
        <?php endif; ?>
            <footer class="text-center">
                &copy; Copyright 2021 Muhammad Daffa
            </footer>
        </div>	
	</div>
</body>
</html>