<?php 

require '../functions.php';

$keyword = $_GET["keyword"];

$query = "SELECT * FROM mahasiswa WHERE 
						nama LIKE '%$keyword%' OR 
						nim LIKE '%$keyword%' OR 
						email LIKE '%$keyword%' OR
						jurusan LIKE '%$keyword%' ";

$mahasiswa = query($query);



 ?>

 <table border="1" cellpadding="10" cellspacing="0">
		<tr>
			<th>No.</th>
			<th>Aksi</th>
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
			<td>
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