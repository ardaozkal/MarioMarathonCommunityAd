<?php
header('Content-type: image/png');
$donationImage = imagecreatefrompng("img.png");
$json = json_decode(utf8_encode(file_get_contents("http://www.mariomarathon.com/rest/partners/arqade.com")));

$white = imagecolorallocate($donationImage, 255, 255, 255);

$total = round($json->total);
$byus = $json->domainTotal;

$bbox = imagettfbbox(40, 0, 'dosis.ttf', "$".$total);
$bbox = imagettfbbox(40, 0, 'dosis.ttf', "$".$byus);

$x = $bbox[0] + (226 / 2) - ($bbox[4] / 2);
$x2 = $bbox2[0] + (578 / 2) - ($bbox2[4] / 2) + 75;

imagettftext($donationImage,40,0,$x,460,$white,'dosis.ttf',"$".$total);
imagettftext($donationImage,40,0,$x2,460,$white,'dosis.ttf',"$".$byus);
imagepng($donationImage);
imagedestroy($donationImage);
?>