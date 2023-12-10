<?php
// Розмір та кольори
$width = 400;
$height = 400;

$image = imagecreatetruecolor($width, $height);
$background_color = imagecolorallocate($image, 255, 255, 255);
$bar_color = imagecolorallocate($image, 0, 0, 255);
$border_color = imagecolorallocate($image, 0, 0, 0);
$data = file_get_contents("ex1.json");
$data = json_decode($data, $assoc=true);

// Кількість стовпців та їх відступи
$num_bars = count($data);
$bar_spacing = $width / $num_bars / 8;
$bar_width = ($width - 3 * $bar_spacing) / $num_bars;
$lift = $height / 20;

// Заповнення фону
imagefill($image, 0, 0, $background_color);

// Малювання стовпчатої діаграми
var_dump($data);
foreach ($data as $key => $value) {
    $x1 = $bar_width + 2 * $bar_spacing;
    $x2 = $x1 + $bar_width - $bar_spacing;
    $y1 = ($height - $lift)*(100 - $value["value"]*10)/100;
    $y2 = $height - $lift;
	echo ($x1." ".$x2." ".$y1." ".$y2);

    imagefilledrectangle($image, $x1, $y1, $x2, $y2, $bar_color);
    imagerectangle($image, $x1, $y1, $x2, $y2, $border_color);
}

// Виведення зображення
header('Content-Type: image/png');
imagepng($image);

// Звільнення ресурсів
imagedestroy($image);
?>