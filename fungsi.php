<?php
//membuat koneksi ke database mysql


$koneksi = mysqli_connect('192.168.10.253', 'a122106604', 'polke001', 'a122106604');
// $koneksi=mysqli_connect('localhost','root','','pwlgenap2019-akademik');

function enkripsiurl($id)
{
    $enc = base64_encode(rand() * strtotime(date("H:i:s")) . "-" . $id);
    return $enc;
}
function dekripsiurl($string)
{
    $kode = base64_decode($string);
    $id = explode("-", $kode);
    if (isset($id[1])) {
        return $id[1];
    } else {
        echo "<script>
                alert('Diinput Sudah Ada')
                javascript:history.go(-1)
        
            </script>";
    }
}
function search($table, $where, $key = null)
{
    if (isset($key)) {
        $sql = "select * from $table where $where";
    } else {
        $sql = "select * from $table ";
    }
    $hasil = mysqli_query($GLOBALS['koneksi'], $sql) or die(mysqli_error($GLOBALS['koneksi']));
    return $hasil;
}

function generatepdf($size = "A4", $orientation = "Portrait", $html = null, $filename = "doc")
{

    require_once __DIR__ . '/vendor/autoload.php';

    $pdf = new \Dompdf\Dompdf();

    $pdf->loadHtml($html);
    $pdf->setPaper($size, $orientation);
    $pdf->render();
    $pdf->stream($filename . ".pdf", array("Attachment" => FALSE));
}
