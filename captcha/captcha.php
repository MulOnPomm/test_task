<?php
session_start();
$chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$code = '';

for ($i = 0; $i < 5; $i++) {
    $code .= $chars[rand(0, strlen($chars)-1)];
}

$_SESSION["code"]=$code;

$im = imagecreatetruecolor(75, 24);
$bg = imagecolorallocate($im, 22, 86, 165); //background color blue
$fg = imagecolorallocate($im, 255, 255, 255);//text color white
imagefill($im, 0, 0, $bg);
imagestring($im, 5, 5, 5,  $code, $fg);

header("Cache-Control: no-cache, must-revalidate");
header('Content-type: image/png');

imagepng($im);
imagedestroy($im);
?>