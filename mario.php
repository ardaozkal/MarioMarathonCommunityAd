<?php
header('Content-type: image/png');
$donationImage = imagecreatefrompng("img.png");
$white = imagecolorallocate($donationImage, 255, 255, 255);

$json = file_get_contents("http://www.mariomarathon.com/rest/partners/arqade.com");

$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($json, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(!is_array($val)) {
        if ($key == "total") { $total = round($val); }
        else if ($key == "domainTotal") { $byus = $val; }
    }
}

imagettftext($donationImage,30,0,60,450,$white,'arial.ttf',"$".$total);
imagettftext($donationImage,30,0,370,450,$white,'arial.ttf',"$".$byus);
imagepng($donationImage);
imagedestroy($donationImage);
?>