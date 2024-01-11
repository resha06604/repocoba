<!DOCTYPE html>
<html>

<head>
    <title>Sistem Informasi Akademik::Tambah KRS</title>
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
        <br><br><br>
        <h3>Tambah KRS</h3>
        <br>
        <form method="post" action="sv_addKrs.php" autocomplete="off">
            <div class="container p-0">
                <div class="row">
                    <div class="form-group mb-3 col-6">
                        <label for="mhs">Mahasiswa</label>
                        <select name="nim" id="mhs" class="form-select" style="height: 40px;width: 100% ; border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih NIM </option>
                            <?php
                            $hasil = search("mhs", "");
                            while ($row = mysqli_fetch_assoc($hasil)) {
                            ?>
                                <option value=<?= $row["nim"]; ?>><?= $row["nim"] ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-6">
                        <label for="matkul">Mata Kuliah</label>
                        <select name="idMatkul" id="matkul" class="form-select" style="height: 40px;width: 100% ; border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih Mata Kuliah</option>
                            <?php
                            $hasil = search("matkul", "");
                            while ($row = mysqli_fetch_assoc($hasil)) {
                            ?>
                                <option value=<?= $row["idmatkul"]; ?>><?= $row["namamatkul"] ?></option>
                            <?php  } ?>
                        </select>

                    </div>
                    <div class="form-group mb-3 col-4">
                        <label for="hari">Hari</label>
                        <select class="form-select px-2 w-100" name="hari" style="height: 40px; width: 50%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih Hari</option>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-4">
                        <label for="waktu">Waktu</label>
                        <select class="form-select px-2 w-100" name="waktu" style="height: 40px; width: 100%;border :1px solid #ced4da;border-radius: 0.25rem;" required>
                            <option value='' disabled selected>Pilih Jam</option>
                            <option value="07.00-08.40">07.00-08.40</option>
                            <option value="08.40-10.20">08.40-10.20</option>
                            <option value="10.20-12.00">10.20-12.00</option>
                            <option value="12.30-14.10">12.30-14.10</option>
                            <option value="14.10-16.20">14.10-16.20</option>
                            <option value="16.20-18.00">16.20-18.00</option>
                            <option value="18.30-20.10">18.30-20.10</option>
                            <option value="07.00-19.30">07.00-09.30</option>
                            <option value="09.30-12.00">09.30-12.00</option>
                            <option value="12.30-15.00">12.30-15.00</option>
                            <option value="15.30-18.00">15.30-18.00</option>
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
                <button type="submit" class="btn btn-primary" value="Simpan">Simpan</button>
            </div>
    </div>
    </form>
    </div>
    <script>
        $(document).ready(function() {
            $("#mhs").change(function() {
                var mk = $(this).val()
                $.post('ajaxKrsDosen.php', {
                        id: mk
                    },
                    function(data) {
                        if (data != "") {
                            $("#dosen").html(data)
                        }
                    })
                $.post('ajaxKrsMatkul.php', {
                        id: mk
                    },
                    function(data) {
                        if (data != "") {
                            $("#matkul").html(data)
                        }
                    })
            })
        })
    </script>
</body>

</html>