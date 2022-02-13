$(document).ready(function() {

	// menghilangkan button cari
	$('#tombol-cari').hide();
	
	// event ketika keyword ditulis
	$('#keyword').on('keyup', function() {

		// munculkan icon loading
		$('.loader').show();

		// ajax menggunakan load
		// $('#container').load('ajax/mahasiswa.php?keyword=' + $('#keyword').val());
		// fungsi .load hanya berfungsi ketika method GET

		// $.get()
		$.get('ajax/mahasiswa.php?keyword=' + $('#keyword').val(), function(data) {

			$('#container').html(data);
			$('.loader').hide();

		});




	});

});