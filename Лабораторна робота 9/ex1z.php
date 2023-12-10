<?php
// Розміри та кольори
$width = 400;
$height = 400;
$data = file_get_contents("ex1.json");
$data = json_decode($data, $assoc=true);

function Draw($width, $height, $data){
$image = imagecreatetruecolor($width, $height);
$background_color = imagecolorallocate($image, 255, 255, 255);
$bar_color = imagecolorallocate($image, 0, 155, 155);
$border_color = imagecolorallocate($image, 50, 100, 100);



// Кількість стовпців та їх відступи
$num_bars = count($data);
$bar_spacing = $width / $num_bars / 8;
$bar_width = ($width - 3 * $bar_spacing) / $num_bars;
$lift = $height / 20;

// Створення нового зображення
$image = imagecreatetruecolor($width, $height);

// Заповнення фону
imagefill($image, 0, 0, $background_color);

// Малювання стовпчатої діаграми
foreach ($data as $key => $value) {
    $x1 = $key * $bar_width + 2 * $bar_spacing;
    $x2 = $x1 + $bar_width - $bar_spacing;
    $y1 = $height*(100 - $value["value"]*10)/100 + $lift;
    $y2 = $height - 2 * $lift;

    imagefilledrectangle($image, $x1, $y1, $x2, $y2, $bar_color);
    imagerectangle($image, $x1, $y1, $x2, $y2, $border_color);
}
$string = '451 Grechin V.S. 10.12.23';
$font_size = $lift * 0.7;
$len=strlen($string);

for($i=0;$i<$len;$i++)
{
    $xpos=$i*imagefontwidth($font_size)+2*$bar_spacing;
    $ypos= $height - 1.5*$lift;
    imagechar($image,$font_size,$xpos,$ypos,$string,$border_color);
    $string = substr($string,1);    
    
}
// Виведення зображення
header('Content-Type: image/svg');
imagepng($image);

// Звільнення ресурсів
imagedestroy($image);}
Draw($width,$height,$data);
?>