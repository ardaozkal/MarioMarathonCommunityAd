<?php
header('Content-type: image/png');
$donationImage = imagecreatefrompng("img.png");
$json = json_decode(utf8_encode(file_get_contents("http://www.mariomarathon.com/rest/partners/arqade.com")));

$white = imagecolorallocate($donationImage, 255, 255, 255);

$total = round($json->total);
$byus = $json->domainTotal;

$bbox = imagettfbbox(30, 0, 'arial.ttf', "$".$total);
$bbox = imagettfbbox(30, 0, 'arial.ttf', "$".$byus);

$x = $bbox[0] + (226 / 2) - ($bbox[4] / 2);
$x2 = $bbox2[0] + (578 / 2) - ($bbox2[4] / 2) + 75;

imagettftext($donationImage,30,0,$x,450,$white,'arial.ttf',"$".$total);
imagettftext($donationImage,30,0,$x2,450,$white,'arial.ttf',"$".$byus);
imagepng($donationImage);
imagedestroy($donationImage);
?>