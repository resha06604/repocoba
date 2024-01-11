<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informastesti Akademik::Tambah Data Mata Kuliah</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>

<body>
	<?php
	require "head.html";
	require "fungsi.php";
	?>
	<div class="utama">
		<h2 class="my-3 text-center">Tambah Data Mata Kuliah</h2>
		<div class="alert alert-success alert-dismissible" id="success" style="display:none;">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
		</div>
		<form method="post" action="sv_addMatkul.php" autocomplete="off">
			<div class="form-group mb-3">
                <label for="nim">Id Matkul:</label>
				<input class="form-control" type="text" name="idmatkul" id="idmatkul" required>
			</div>
			<div class="form-group mb-3">
				<label for="namadosen" class="form-label">Nama Mata Kuliah:</label>
				<input type="text" class="form-control" id="namamatkul" name="namamatkul" required style="width: 600px;">
			</div>
            <div class="form-group mb-3">
				<label for="namadosen" class="form-label">SKS:</label>
				<input type="text" class="form-control" id="sks" name="sks" required style="width: 600px;">
			</div>
            <div class="form-group mb-3">
				<label for="namadosen" class="form-label">Jenis:</label>
				<input type="text" class="form-control" id="jns" name="jns" required style="width: 600px;">
			</div>
            <div class="form-group mb-3">
				<label for="namadosen" class="form-label">Semester:</label>
				<input type="text" class="form-control" id="smt" name="smt" required style="width: 600px;">
			</div>
			<div>
				<button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
			</div>
		</form>
	</div>
</body>

</html>