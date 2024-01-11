<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Akademik::Daftar KRS</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="bootstrap4/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/styleku.css">
    <script src="bootstrap4/jquery/3.3.1/jquery-3.3.1.js"></script>
    <script src="bootstrap4/js/bootstrap.js"></script>
    <!-- Use fontawesome 5-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script>
        /*function cetak(hal) {
		  var xhttp;
		  var dtcetak;	
		  xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			  dtcetak= this.responseText;
				qweqeqw
			}
		  };
		  xhttp.open("GET", "ajaxUpdateMhs.php?hal="+hal, true);
		  xhttp.send();
		}*/
    </script>
</head>

<body>
    <?php

    //memanggil file berisi fungsi2 yang sering dipakai
    require "fungsi.php";
    require "head.html";

    $awalData = 0;
    // $jmlData = mysqli_num_rows($qry);

    // $jmlHal = ceil($jmlData / $jmlDataPerHal);
    // if (isset($_GET['hal'])) {
    //     $halAktif = $_GET['hal'];
    // } else {
    //     $halAktif = 1;
    // }

    // $awalData = ($jmlDataPerHal * $halAktif) - $jmlDataPerHal;

    $sql = "select * from krs a JOIN matkul b on (a.sks=b.sks) JOIN mhs c on (a.nim=c.nim) JOIN kultawar d on (a.id_jadwal=d.idkultawar)";
    $hasil = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    $kosong = false;
    if (mysqli_num_rows($hasil) == 0) {
        $kosong = true;
    }
    ?>

    <div class="utama">
        <h2 class="text-center mt-3">Daftar KRS</h2>
        <!-- <div class="text-center"><a href="prnDosenPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div> -->
        <!-- <div class="text-center"><a href="prnDosenPdf.php"><span class="fas fa-print">&nbsp;Print</span></a></div> -->
        <span class="float-left">
            <a class="btn btn-success" href="addKrs.php">Tambah Data</a>
        </span>
        <span class="float-right">
            <form action="" method="post" class="form-inline">
                <button class="btn btn-success" type="submit">Cari</button>
                <input class="form-control mr-2 ml-2" type="text" name="cari" placeholder="cari data krs..." autocomplete="off">
            </form>
        </span>
        </span>
        <br><br>

        <!-- Cetak data dengan tampilan tabel -->
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>No.</th>
                    <th>ID KRS</th>
                    <th>NIM</th>
                    <th>ID Jadwal</th>
                    <th style="text-align: center">SKS</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //jika data tidak ada
                if (mysqli_num_rows($hasil) == 0) {
                ?>
                    <tr>
                        <th colspan="6">
                            <div class="alert alert-info alert-dismissible fade show text-center">
                                <!--<button type="button" class="close" data-dismiss="alert">&times;</button>-->
                                Data tidak ada
                            </div>
                        </th>
                    </tr>
                    <?php
                } else {
                    $no = $awalData + 1;
                    while ($row = mysqli_fetch_assoc($hasil)) {
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td style="text-align: left"><?php echo $row['idKrs'] ?></td>
                            <td style="text-align: left"><?php echo $row["nim"] ?></td>
                            <td style="text-align: left"><?php echo $row["id_jadwal"] ?></td>
                            <td style="text-align: center"><?php echo $row["sks"] ?></td>
                            <td>
                                <a class="btn btn-outline-primary btn-sm" href="editKrs.php?kode=<?php echo enkripsiurl($row['idKrs']) ?>">Edit</a>
                                <a class="btn btn-outline-danger btn-sm" href="hpsKrs.php?kode=<?php echo enkripsiurl($row['idKrs']) ?>" id="linkHps" onclick="return confirm('Yakin dihapus nih?')">Hapus</a>
                            </td>
                        </tr>
                <?php
                        $no++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>