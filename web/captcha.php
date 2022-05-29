<?php

$cont = imagecreatetruecolor(64, 64);
$str = imagecolorallocate($cont, 255, 255, 255);

imagestring($cont, 11, 28, 25, $_GET['cont'], $str);
imagepng($cont);
imagedestroy($cont);
