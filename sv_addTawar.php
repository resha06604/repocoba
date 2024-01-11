
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idmatkul = $_POST["idmatkul"];
$npp = $_POST["npp"];
$klp = $_POST['klp'];
$hari = $_POST["hari"];
$jamkul = $_POST["jamkul"];
$ruang = $_POST["ruang"];


    $rs=mysqli_query($koneksi, $q);
    if(mysqli_num_rows($rs) == 0){
        $sql = "insert into kultawar values('$idmatkul','$npp','$klp','$hari','$jamkul','$ruang')";
        mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
        header("location:updateTawar.php");
    } else {
        echo "<script>
                alert('Kultawar yang Diinput Sudah Ada')
                javascript:history.go(-1)
        
            </script>";
    }
// }


?>