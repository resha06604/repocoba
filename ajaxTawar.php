<?php
    require "fungsi.php";

    // $mk = $_POST['matkul'];
    // // $kodemk = search('matkul','id='.$mk);
    // // $datamk = mysqli_fetch_object($kodemk);
    // $kodeprogdi = explode(".", $mk)[0];; //A12 3kode awal
    // $rs = search('dosen',"homebase='".$kodeprogdi."'");
    // $option = "";
    // while($data =mysqli_fetch_object($rs))
    // {
    //     $option='<option value="'.$data->npp.'">'.$data->namadosen.'</option>';
    // }

    // echo $option;

    $id = $_POST["id"];
    $homebase = explode(".", $id)[0];
    $hasil2 = search("dosen", "homebase='$homebase'", $homebase);
    ?>
    <option value='' disabled selected><?= $homebase?></option>
    <?php
    while ($row = mysqli_fetch_assoc($hasil2)) {
    ?>
        <option value=<?= $row["npp"]; ?>><?= $row["namadosen"] ?></option>
    <?php } ?>