<?php

require 'vendor/autoload.php';

$file = $_POST['file'];
$folder = $_POST['folder'];
// $pdf = new Spatie\PdfToImage\Pdf('D:\LARAVEL\cobaLaravel\public\pdf/what.pdf');
$pdf = new Spatie\PdfToImage\Pdf($file);

$jmlHalaman = $pdf->getNumberOfPages(); //returns an int

$user = 'data/' . $folder;
if (is_dir($user)) {
    array_map('unlink', glob("$user/*.*"));
    rmdir($user);
}
mkdir($user);

set_time_limit(0);

for ($i = 1; $i <= $jmlHalaman; $i++) {
    $pdf->setPage($i)->saveImage($user . '/image' . $i . '.jpg');
}


// BW DETECTOR

$source_file = "result/image4.jpg";


function isGrayscale($source_file)
{
    $extensiFile = explode(".", $source_file);
    $extensiFile = strtolower(end($extensiFile));
    if ($extensiFile == 'jpg') {
        $im = imagecreatefromjpeg($source_file);
    } else {
        $im = imagecreatefrompng($source_file);
    }


    $imgw = imagesx($im);
    $imgh = imagesy($im);

    $r = array();
    $g = array();
    $b = array();

    $c = 0;

    for ($i = 0; $i < $imgw; $i++) {
        for ($j = 0; $j < $imgh; $j++) {

            // get the rgb value for current pixel

            $rgb = ImageColorAt($im, $i, $j);

            // extract each value for r, g, b

            $r[$i][$j] = ($rgb >> 16) & 0xFF;
            $g[$i][$j] = ($rgb >> 8) & 0xFF;
            $b[$i][$j] = $rgb & 0xFF;

            // count gray pixels (r=g=b)

            if ($r[$i][$j] == $g[$i][$j] && $r[$i][$j] == $b[$i][$j]) {
                $c++;
            }
        }
    }

    if ($c == ($imgw * $imgh)) {
        // echo "The image is grayscale.";
        return 1;
    } else {
        return 0;
    }
}


$bw = 0;
$warna = 0;
for ($i = 1; $i <= $jmlHalaman; $i++) {
    $result = isGrayscale($user . '/image' . $i . '.jpg');
    if ($result == 1) {
        $bw++;
    } else {
        $warna++;
    }
}

$output = [
    'warna' => $warna,
    'bw' => $bw,
];

echo json_encode($output);
