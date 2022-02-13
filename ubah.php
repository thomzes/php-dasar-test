<?php
session_start();

if ( !isset($_SESSION["login"]) ) {
	header ("Location: login.php");
	exit;
}

require 'functions.php';

// ambil data di url
$id = $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];



// cek apakah tombol submit sudah di klik atau belum
if( isset($_POST["submit"]) ) {



	// cek apakah data berhasil diubah atau tidak
	if( ubah($_POST) > 0 ) {
		echo "<script>
		alert('data berhasil diubah!');
		document.location.href = 'index.php';
		</script>";

	}else {
		echo "<script>
		alert('data gagal diubah!');
		document.location.href = 'index.php';
		</script>";
	}
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data Mahasiswa</title>
</head>
<body>

	<h1>Edit Data Mahasiswa</h1>

	<form action="" method="post" enctype="multipart/form-data">

		<input type="hidden" name="id" value="<?php echo $mhs["id"]; ?>">
		<input type="hidden" name="gambarLama" value="<?php echo $mhs["gambar"]; ?>">

		<ul>
			<li>
				<label for="nama">Nama : </label>
				<input type="text" name="nama" id="nama" value="<?php echo $mhs["nama"]; ?>">
			</li>

			<li>
				<label for="nim">NIM : </label>
				<input type="text" name="nim" id="nim" required value="<?php echo $mhs["nim"]; ?>">
			</li>

			<li>
				<label for="email">Email : </label>
				<input type="text" name="email" id="email" value="<?php echo $mhs["email"]; ?>">
			</li>

			<li>
				<label for="jurusan">Jurusan : </label>
				<input type="text" name="jurusan" id="jurusan" value="<?php echo $mhs["jurusan"]; ?>">
			</li>

			<li>
				<label for="gambar">Gambar : </label> <br>
				<img src="img/<?php echo $mhs['gambar']; ?>" width="40" alt="">
				<input type="file" name="gambar" id="gambar">
			</li>

			<li>
				<button type="submit" name="submit">Edit Data!</button>
			</li>

		</ul>


	</form>
	
</body>
</html>