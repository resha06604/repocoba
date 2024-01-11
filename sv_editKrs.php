
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idKrs = $_POST['idKrs'];
$nim = $_POST["nim"];
$idMatkul = $_POST['idMatkul'];
$nilai = $_POST["nilai"];
$hari = $_POST["hari"];
$waktu = $_POST["waktu"];
$ruang = $_POST["ruang"];


$sql = "update krs set idKrs='$idKrs',
					              nim='$nim',
						            idJadwal='$idJadwal',
						       
                        hari='$hari',
                        waktu='$waktu',
                        ruang='$ruang',
					    where idKrs=$idKrs";
mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
header("location:updateKrs.php");



?>