<?php 

session_start();

if ( !isset($_SESSION["login"]) ) {
	header ("Location: login.php");
	exit;
}

require 'functions.php';

$mahasiswa = query("SELECT * FROM mahasiswa");

// tombol cari di klik
if( isset($_POST["cari"]) ) {
	$mahasiswa = cari($_POST["keyword"]);
}

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Admin</title>
	
	<style>
		.loader {
			width: 50px;
			position: absolute;
			top: 118px;
			z-index: -1;
			padding-left: 5px;
			display: none;
		}

		@media print {
			.logout, .tambah, .form-cari, .aksi {
				display: none;
			}
		}

	</style>

	<script src="js/jquery-3.6.0.min.js"></script>
	<script src="js/script.js"></script>

</head>


<body>


	<a href="logout.php" class="logout">Logout!</a> | <a href="cetak.php" target="_blank">Cetak</a>

	<h1>Daftar Mahasiswa</h1>

	<a href="tambah.php" class="tambah">Tambah data mahasiswa</a>
	<br><br>

	<form action="" method="post" class="form-cari">
		
		<input type="text" name="keyword" size="30" autofocus placeholder="Masukan Keyword Pencarian.." autocomplete="off" id="keyword">
		<button type="submit" name="cari" id="tombol-cari">Cari</button>
		<img src="img/load.gif" class="loader" alt="">
		

	</form>


	<br>
	
	<div id="container">

	<table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th class="aksi">Aksi</th>
			<th>Gambar</th>
			<th>Nim</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Jurusan</th>
		</tr>

		<?php $i = 1; ?>
		<?php foreach ($mahasiswa as $row) { ?>
			
		<tr>
			<td><?php echo $i; ?></td>
			<td class="aksi">
				<a href="ubah.php?id=<?php echo $row["id"]; ?>">Edit</a> | 
				<a href="hapus.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('yakin ingin menghapus data?');">Delete</a>
			</td>
			<td><img src="img/<?php echo $row["gambar"]; ?>" width="50" height="50" alt=""></td>
			<td><?php echo $row["nim"]; ?></td>
			<td><?php echo $row["nama"]; ?></td>
			<td><?php echo $row["email"]; ?></td>
			<td><?php echo $row["jurusan"] ?></td>
		</tr>
		<?php $i++; ?>
		<?php } ?>

	</table>

	</div>


	
</body>
</html>