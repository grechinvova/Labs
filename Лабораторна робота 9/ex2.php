<?php
// Розміри та кольори
$width = 400;
$height = 400;
$data = file_get_contents("ex1.json");
$data = json_decode($data, $assoc=true);

header('Content-Type: image/svg+xml');
echo '<?xml version="1.0" encoding="UTF-8" standalone="no"?>';
echo '<!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" ';
echo '"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">';
echo '<svg width="' . $width . '" height="' . $height . '" version="1.1" xmlns="http://www.w3.org/2000/svg">';

$num_bars = count($data);
$bar_spacing = $width / $num_bars / 8;
$bar_width = ($width - 3 * $bar_spacing) / $num_bars;
$lift = $height / 20;
foreach ($data as $key => $value) {
    $x1 = $key * $bar_width + 2 * $bar_spacing;
    $x2 = $x1 + $bar_width - $bar_spacing;
    $y1 = $height*(100 - $value["value"]*10)/100 + $lift;
    $y2 = $height - 2 * $lift;
echo '<rect x="'.$x1.'" y="'.$y1.'" width="'.$bar_width.'" height="'.$y2+$lift.'" fill="#666" />';
;
}


echo "</svg>";
?>