
<?php
//memanggil file pustaka fungsi
require "fungsi.php";

//memindahkan data kiriman dari form ke var biasa
$idmatkul = $_POST["idmatkul"];
$namamatkul = $_POST["namamatkul"];
$sks = $_POST["sks"];
$jns = $_POST["jns"];
$smt = $_POST["smt"];
$var = "/^[.a-zA-Z, ]*$/";


    $q="select * from matkul where idmatkul='".$idmatkul."'";
    $rs=mysqli_query($koneksi, $q);
    if(mysqli_num_rows($rs) == 0){
        $sql = "insert into matkul values('$idmatkul','$namamatkul','$sks','$jns','$smt')";
        mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
        header("location:updateMatkul.php");
    } else {
        echo "<script>
                alert('idmatkul yang Diinput Sudah Ada')
                javascript:history.go(-1)
        
            </script>";
    }
// }


?>