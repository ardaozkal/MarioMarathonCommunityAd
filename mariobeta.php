<?php
header('Content-type: image/png');
$donationImage = imagecreatefrompng("img.png");
$white = imagecolorallocate($donationImage, 255, 255, 255);

$json = json_decode(utf8_encode(file_get_contents("http://www.mariomarathon.com/rest/partners/arqade.com")));
$total = round($json->total);
$byus = $json->domainTotal;

imagettftext($donationImage,30,0,60,450,$white,'arial.ttf',"$".$total);
imagettftext($donationImage,30,0,370,450,$white,'arial.ttf',"$".$byus);
imagepng($donationImage);
imagedestroy($donationImage);
?>
