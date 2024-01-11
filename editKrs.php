<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informasi Akademik:Edit Data KRS</title>
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
	$idKrs = dekripsiurl($_GET["kode"]);
	$sql = "select * from krs where idKrs='$idKrs'";
	$qry = mysqli_query($koneksi, $sql);
	if (mysqli_num_rows($qry) == 0) {
		echo "<script>
		alert('idkrs tidak ditemukan');
		javascript:history.go(-1);</script>";
		exit();
	}

	$row = mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-3 text-center">Edit KRS</h2>
		<div class="col-sm-9">
			<form enctype="multipart/form-data" method="post" action="sv_editKrs.php">
				<input value=<?= $row["idKrs"] ?> type="hidden" class="form-control" name="idKrs" required>
				<div class="row">
					<div class="form-group mb-3 col-12">
						<label for="idmatkul" class="form-label">NIM Mahasiswa:</label>
						<input readonly class="form-control" type="text" name="nim" id="mhs" value=<?php echo $row['nim']; ?> required style="width: 100%`; background-color: #fff">
					</div>
				</div>
				<div class="row">
					<div class="form-group mb-3 col-12">
						<label for="matkul">Nama Mata Kuliah:</label>
						<div class="d-flex justify-content-between" id="klpGroup">
							<input readonly class=" form-control" type="text" name="idmatkul" id="idmatkul" style="width:100% ; background-color: #fff" value=<?php echo $row['namamatkul']; ?> required>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="form-group mb-3 col-3">
						<label for="hari">Hari</label>
						<select class="form-select px-2 w-100" name="hari" style="height: 40px; width: 50%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
							<option value='' disabled selected>Pilih Hari</option>
							<option value="Senin" <?= $row['hari'] == "Senin" ? ' selected="selected"' : ''; ?>>Senin</option>
							<option value="Selasa" <?= $row['hari'] == "Selasa" ? ' selected="selected"' : ''; ?>>Selasa</option>
							<option value="Rabu" <?= $row['hari'] == "Rabu" ? ' selected="selected"' : ''; ?>>Rabu</option>
							<option value="Kamis" <?= $row['hari'] == "Kamis" ? ' selected="selected"' : ''; ?>>Kamis</option>
							<option value="Jumat" <?= $row['hari'] == "Jumat" ? ' selected="selected"' : ''; ?>>Jumat</option>
						</select>
					</div>
					<div class="form-group mb-3 col-3">
						<label for="waktu">Waktu</label>
						<select class="form-select px-2 w-100" name="waktu" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
							<option value='' disabled selected>Pilih Jam</option>
							<option value="07.00-08.40" <?= $row['waktu'] == "07.00-08.40" ? ' selected="selected"' : ''; ?>>07.00-08.40</option>
							<option value="07.00-09.30" <?= $row['waktu'] == "07.00-09.30" ? ' selected="selected"' : ''; ?>>07.00-09.30</option>
							<option value="08.40-10.20" <?= $row['waktu'] == "08.40-10.20" ? ' selected="selected"' : ''; ?>>08.40-10.20</option>
							<option value="10.20-12.00" <?= $row['waktu'] == "10.20-12.00" ? ' selected="selected"' : ''; ?>>10.20-12.00</option>
							<option value="12.30-14.10" <?= $row['waktu'] == "12.30-14.10" ? ' selected="selected"' : ''; ?>>12.30-14.10</option>
							<option value="12.30-15.00" <?= $row['waktu'] == "12.30-15.00" ? ' selected="selected"' : ''; ?>>12.30-15.00</option>
							<option value="14.10-16.20" <?= $row['waktu'] == "14.10-16.20" ? ' selected="selected"' : ''; ?>>14.10-16.20</option>
							<option value="15.30-18.00" <?= $row['waktu'] == "15.30-18.00" ? ' selected="selected"' : ''; ?>>15.30-18.00</option>
							<option value="16.20-18.00" <?= $row['waktu'] == "16.20-18.00" ? ' selected="selected"' : ''; ?>>16.20-18.00</option>
							<option value="18.30-20.10" <?= $row['waktu'] == "18.30-20.10" ? ' selected="selected"' : ''; ?>>18.30-20.10</option>
						</select>
					</div>
					<div class="form-group col-sm">
						<label for="semester" class="form-label d-block">Ruang:</label>
						<div class="d-flex justify-content-between">
							<select class="form-select px-2 w-100" name="ruang" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
								<option value='' disabled selected>Pilih Ruang</option>
								<option value="H.3.1">H.3.1</option>
								<option value="H.3.2">H.3.2</option>
								<option value="H.3.3">H.3.3</option>
								<option value="H.4.1">H.4.1</option>
								<option value="H.4.2">H.4.2</option>
								<option value="H.4.3">H.4.3</option>
								<option value="H.5.1">H.5.1</option>
								<option value="H.5.2">H.5.2</option>
								<option value="H.5.3">H.5.3</option>
								<option value="H.6.1">H.6.1</option>
								<option value="H.6.2">H.6.2</option>
								<option value="H.6.3">H.6.3</option>
								<option value="H.7.1">H.7.1</option>
								<option value="H.7.2">H.7.2</option>
								<option value="H.7.3">H.7.3</option>
							</select>
						</div>
						          
					</div>
				</div>

				<div>
					<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
				</div>
			</form>
		</div>
	</div>
	</div>
	<!-- <script>
		$('#submit').on('click',function(){
			var idmatkul 		= $('#idmatkul').val();
			var namamatkul	= $('#namamatkul').val();
			var sks 	      = $('#sks').val();
			var jns 	      = $('#jns').val();
			var smt 	      = $('#smt').val();
			$.ajax({
				method	: "POST",
				url		: "sv_editMatkul.php",
				data	: {idmatkul:idmatkul, namamatkul:namamatkul, sks:sks, jns:jns, smt:smt}
			});
		});
	</script> -->
</body>

</html>