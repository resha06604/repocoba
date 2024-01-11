<!DOCTYPE html>
<html>

<head>
	<title>Sistem Informasi Akademik::Edit Mata Kuliah</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styleku.css">
	<script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
	<script src="bootstrap4/js/bootstrap.js"></script>
</head>

<body>
	<?php
	require "fungsi.php";
	require "head.html";
	$idmatkul = dekripsiurl($_GET["kode"]);
	$sql = "select * from matkul where idmatkul='$idmatkul'";
	$qry = mysqli_query($koneksi, $sql);
	if (mysqli_num_rows($qry) == 0) {
		echo "<script>
                alert('idmatkul Tidak Ditemukan')
                javascript:history.go(-1)
            </script>";
		exit();
	}
	$row = mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="my-3 text-center">Edit Data Mata Kuliah</h2>
		<div class="row">
			<div class="col-sm-9">
				<form method="post" action="sv_editMatkul.php" autocomplete="off">
					<div class="form-group">
						<label for="npp">Id Matkul:</label>
						<input readonly class="form-control" type="text" name="idmatkul" id="idmatkul" value=<?php echo $row['idmatkul']; ?> required style="width: 300px; background-color: #fff">
					</div>
					<div class="form-group">
						<label for="namadosen">Nama Mata Kuliah:</label>
						<input class="form-control" type="text" name="namamatkul" id="namamatkul" value="<?php echo $row['namamatkul'] ?>" style="width: 600px;">
					</div>
                    <div class="form-group">
						<label for="namadosen">SKS:</label>
						<input class="form-control" type="text" name="sks" id="sks" value="<?php echo $row['sks'] ?>" style="width: 600px;">
					</div>
                    <div class="form-group">
						<label for="namadosen">Jenis:</label>
						<input class="form-control" type="text" name="jns" id="jns" value="<?php echo $row['jns'] ?>" style="width: 600px;">
					</div>
                    <div class="form-group">
						<label for="namadosen">Semester:</label>
						<input class="form-control" type="text" name="smt" id="smt" value="<?php echo $row['smt'] ?>" style="width: 600px;">
					</div>
					<div>
						<button class="btn btn-primary" type="submit" id="submit">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>

</html>