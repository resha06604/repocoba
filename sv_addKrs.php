
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$nim = $_POST["nim"];
$idMatkul = $_POST['idMatkul'];
$hari = $_POST["hari"];
$waktu = $_POST["waktu"];
$ruang = $_POST["ruang"];

$sql = "insert into krs values('','$nim','$idMatkul','$hari','$waktu','$ruang')";
mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
header("location:updateKrs.php");
?>