<?php

require "fungsi.php";
$nim = $_GET['nim'];
// $sql = "SELECT * FROM mhs a JOIN krs b ON (a.nim=b.nim) JOIN kultawar c ON (b.id_jadwal=c.idkultawar) JOIN matkul d ON (c.idmatkul = d.id) WHERE b.nim='" . $nim . "'";
$sql = "select * from krs a join kultawar b on (a.id_jadwal=b.idkultawar) join matkul c on (c.id=b.idmatkul) join dosen d on (b.npp=d.npp) where a.nim='" . $nim . "'";

//untuk ambil data mahasiswa
$mhs = search('mhs', "nim = '" . $nim . "'");
$rsmhs = mysqli_fetch_object($mhs);

$rs = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));

$html = '<h2 style="text-align:center;">KRS Mahasiswa</h2>';
$html .= '<p>NIM : ' . $rsmhs->nim;
$html .= '<p>Nama : ' . $rsmhs->nama;
$html .= '<table style="width:100%;border: 1px solid black;border-collapse: collapse;">
            <tr>
                <th style="border: 1px solid black;text-align:center">No</th>
                <th style="border: 1px solid black;text-align:center">Kode Mata Kuliah</th>
                <th style="border: 1px solid black;text-align:center">Nama Mata Kuliah</th>
                <th style="border: 1px solid black;text-align:center">SKS</th>
                <th style="border: 1px solid black;text-align:center">Jadwal</th>
                <th style="border: 1px solid black;text-align:center">Dosen Pengampu</th>
            </tr>';
$i = 1;
$totalsks = 0;
while ($data = mysqli_fetch_object($rs)) {
    $totalsks += $data->sks;
    $html .= '
            <tr>
                <td style="border: 1px solid black;border-collapse: collapse;text-align:center">' . $i . '</td>
                <td style="border: 1px solid black;border-collapse: collapse;text-align:center">' . $data->idmatkul . '</td>
                <td style="border: 1px solid black;border-collapse: collapse;">' . $data->namamatkul . '</td>
                <td style="border: 1px solid black;border-collapse: collapse;text-align:center">' . $data->sks . '</td>
                <td style="border: 1px solid black;border-collapse: collapse;text-align:center">' . $data->hari . ' ' . $data->jamkul . '</td>
                <td style="border: 1px solid black;border-collapse: collapse;text-align:center">' . $data->npp . '</td>
            </tr>';
    $i++;
}
$html .=    "<tr><td colspan=3>Total SKS</td>
                 <td style='border: 1px solid black;border-collapse: collapse;text-align:center'> " . $totalsks . "</td>
                 <td colspan=2></td>
            </tr>";
$html .= '</table>';
// echo $html;

// php 8 keatas
// generatepdf(html: $html, filename: 'krs_mhs_' . $nim);

// php 8 kebawah
generatepdf('A4', 'Portrait', $html, 'krs_mhs_' . $nim);
