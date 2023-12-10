<!DOCTYPE html>
 <html>
 <head> 
 <meta charset="utf-8"> 
 </head> 
 <body> 
 <div>
<?php
$text = "";
$filec = "";
    if(isset($_POST['text'])) $text = $_POST['text'];
	$file = fopen(__DIR__ . '/file1.txt', 'a');
    fputs($file, $text . PHP_EOL);
	fclose($file);
if (file_exists(__DIR__ . '/file1.txt')){ 
$filec = fopen(__DIR__ . '/file1.txt', 'r');
while (!feof($filec)) {
    echo "<p>".fgets($filec)."</p>";
}
fclose($filec);}
?>
</div>
 <form method="POST">
     <textarea name="text"></textarea>
     <input type="submit" value="submit">
 </form>
 </body> 
 </html> 
 </body> 
 </html>