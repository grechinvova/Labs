<!DOCTYPE html>
 <html>
 <head> 
 <meta charset="utf-8"> 
 </head> 
 <body> 
 <h3>Вхід</h3> 
 <form  enctype="multipart/form-data" method="POST">
	<input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
	<input name="userfile" type="file" />
    <input type="submit" value="Увійти">
 </form>
 <?php
 $link = "./images/";
 if (move_uploaded_file($_FILES['userfile']['tmp_name'], $link . basename($_FILES['userfile']['name']))) {
    echo "Файл корректен и был успешно загружен.\n";
}
else {
    echo "Возможная атака с помощью файловой загрузки!\n";
}
function LoadJpeg($imgname)
{
    /* Attempt to open */
    $im = imagecreatefrompng($imgname);

    /* See if it failed */
    if(!$im)
    {
        /* Create a black image */
        $im  = imagecreatetruecolor(150, 30);
        $bgc = imagecolorallocate($im, 255, 255, 255);
        $tc  = imagecolorallocate($im, 0, 0, 0);

        imagefilledrectangle($im, 0, 0, 150, 30, $bgc);

        /* Output an error message */
        imagestring($im, 1, 5, 5, 'Error loading ' . $imgname, $tc);
    }
$font = "Roboto-MediumItalic.ttf";
imagettftext($im, 20, 0, 11, 21, $grey, $font, "451 Grechin V.S. 10.12.23");
    return $im;
}
$img = LoadJpeg($link . basename($_FILES['userfile']['name']));

header('Content-Type: image/png');
imagepng($img, $link . "copy.png");
imagedestroy($img);
 ?>
 </body> 
 </html> 