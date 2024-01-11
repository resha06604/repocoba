<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Akademik:Edit Data Mahasiswa</title>
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
	$idkultawar = dekripsiurl($_GET["kode"]);
	$sql="select * from kultawar where idkultawar='$idkultawar'";
	$qry=mysqli_query($koneksi,$sql);
	if(mysqli_num_rows($qry) == 0){
		echo "<script>
		alert('idmatkul tidak ditemukan');
		javascript:history.go(-1);</script>";
		exit();
	}

	$row=mysqli_fetch_assoc($qry);
	?>
	<div class="utama">
		<h2 class="mb-3 text-center">Edit Penawaran Mata Kuliah</h2>	
		<div class="col-sm-9">
			<form enctype="multipart/form-data" method="post" action="sv_editTawar.php">
				<div class="row">
					<div class="form-group mb-3 col-12">
						<label for="idmatkul" class="form-label">ID Matkul:</label>
            <input readonly class="form-control" type="text" name="idmatkul" id="idmatkul" value=<?php echo $row['idmatkul']; ?> required style="width: 100%`; background-color: #fff">
					</div>
          <div class="form-group mb-3 col-12">
            <label for="npp">Dosen:</label>
              <div id="dosenGroup">
                <?php
                $hb = explode(".", $row['idmatkul'])[0];
                ?>
                <select class="form-select px-2 mr-3" name="npp" style="height: 40px;width: 100%; border :1px solid #ced4da;border-radius: 0.25rem;" required>
                  <option value='' disabled selected>Pilih Dosen</option>
                  <?php
                  $hasil = search("dosen", "homebase='$hb'", 0, "$hb");
                  while ($rd = mysqli_fetch_assoc($hasil)) {
                  ?>
                    <option <?= $row['npp'] == $rd['npp'] ? ' selected="selected"' : ''; ?> value=<?= $rd["npp"]; ?>><?= $rd["namadosen"] ?></option>
                  <?php } ?>
                </select>
              </div>
				  </div>
				</div>

				<div class="row mb-12">
          <div class="form-group mb-3 col-3">
						<label for="npp">Kelompok:</label>
						<div class="d-flex justify-content-between" id="klpGroup">
							<input class=" form-control" type="text" name="klp" id="klp" style="width:100%" value=<?php echo $row['klp']; ?> required>
						</div>
					</div>
          <div class="form-group col-3">
						<label for="hari" class="form-label d-block">Hari:</label>
              <select class="form-select px-2 w-100" name="hari" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih Hari</option>
                            <option value="Senin" <?= $row['hari'] == "Senin"? ' selected="selected"' : ''; ?>>Senin</option>
                            <option value="Selasa" <?= $row['hari'] == "Selasa"? ' selected="selected"' : ''; ?>>Selasa</option>
                            <option value="Rabu" <?= $row['hari'] == "Rabu"? ' selected="selected"' : ''; ?>>Rabu</option>
                            <option value="Kamis" <?= $row['hari'] == "Kamis"? ' selected="selected"' : ''; ?>>Kamis</option>
                            <option value="Jumat" <?= $row['hari'] == "Jumat"? ' selected="selected"' : ''; ?>>Jumat</option>
              </select>
					</div>
          <div class="form-group col-3">
						<label for="jamkul" class="form-label d-block">Waktu:</label>
            <select class="form-select px-2 w-100" name="jamkul" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih Jam</option>
                            <option value="07.00-08.40" <?= $row['jamkul'] == "07.00-08.40"? ' selected="selected"' : ''; ?>>07.00-08.40</option>
                            <option value="07.00-09.30" <?= $row['jamkul'] == "07.00-09.30"? ' selected="selected"' : ''; ?>>07.00-09.30</option>
                            <option value="08.40-10.20" <?= $row['jamkul'] == "08.40-10.20"? ' selected="selected"' : ''; ?>>08.40-10.20</option>
                            <option value="10.20-12.00" <?= $row['jamkul'] == "10.20-12.00"? ' selected="selected"' : ''; ?>>10.20-12.00</option>
                            <option value="12.30-14.10" <?= $row['jamkul'] == "12.30-14.10"? ' selected="selected"' : ''; ?>>12.30-14.10</option>
                            <option value="12.30-15.00" <?= $row['jamkul'] == "12.30-15.00"? ' selected="selected"' : ''; ?>>12.30-15.00</option>
                            <option value="14.10-16.20" <?= $row['jamkul'] == "14.10-16.20"? ' selected="selected"' : ''; ?>>14.10-16.20</option>
                            <option value="15.30-18.00" <?= $row['jamkul'] == "15.30-18.00"? ' selected="selected"' : ''; ?>>15.30-18.00</option>
                            <option value="16.20-18.00" <?= $row['jamkul'] == "16.20-18.00"? ' selected="selected"' : ''; ?>>16.20-18.00</option>
                            <option value="18.30-20.10" <?= $row['jamkul'] == "18.30-20.10"? ' selected="selected"' : ''; ?>>18.30-20.10</option>
                        </select>
					</div>
          <div class="form-group col-3">
						<label for="ruang" class="form-label d-block">ruang:</label>
            <select class="form-select px-2 w-100" name="ruang" style="height: 40px; width: 50%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
                                <option value='' disabled selected>Pilih Ruang</option>
                                <option value="H.3.1" <?= $row['ruang'] == "H.3.1"? ' selected="selected"' : ''; ?>>H.3.1</option>
                                <option value="H.3.2" <?= $row['ruang'] == "H.3.2"? ' selected="selected"' : ''; ?>>H.3.2</option>
                                <option value="H.3.3" <?= $row['ruang'] == "H.3.3"? ' selected="selected"' : ''; ?>>H.3.3</option>
                                <option value="H.4.1" <?= $row['ruang'] == "H.4.1"? ' selected="selected"' : ''; ?>>H.4.1</option>
                                <option value="H.4.2" <?= $row['ruang'] == "H.4.2"? ' selected="selected"' : ''; ?>>H.4.2</option>
                                <option value="H.4.3" <?= $row['ruang'] == "H.4.3"? ' selected="selected"' : ''; ?>>H.4.3</option>
                                <option value="H.5.1" <?= $row['ruang'] == "H.5.1"? ' selected="selected"' : ''; ?>>H.5.1</option>
                                <option value="H.5.2" <?= $row['ruang'] == "H.5.2"? ' selected="selected"' : ''; ?>>H.5.2</option>
                                <option value="H.5.3" <?= $row['ruang'] == "H.5.3"? ' selected="selected"' : ''; ?>>H.5.3</option>
                                <option value="H.6.1" <?= $row['ruang'] == "H.6.1"? ' selected="selected"' : ''; ?>>H.6.1</option>
                                <option value="H.6.2" <?= $row['ruang'] == "H.6.2"? ' selected="selected"' : ''; ?>>H.6.2</option>
                                <option value="H.6.3" <?= $row['ruang'] == "H.6.3"? ' selected="selected"' : ''; ?>>H.6.3</option>
                                <option value="H.7.1" <?= $row['ruang'] == "H.7.1"? ' selected="selected"' : ''; ?>>H.7.1</option>
                                <option value="H.7.2" <?= $row['ruang'] == "H.7.2"? ' selected="selected"' : ''; ?>>H.7.2</option>
                                <option value="H.7.3" <?= $row['ruang'] == "H.7.3"? ' selected="selected"' : ''; ?>>H.7.3</option>
                            </select>
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