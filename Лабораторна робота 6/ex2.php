<html> 
    <head>
        <title>qqq</title>
    </head>
    
    <body>
        <?php
	$counter = 0;
	if(isset($_COOKIE["counter"])){
	$counter = $_COOKIE["counter"];
	echo 'Ви зайшли на сторінку ' . $_COOKIE['counter'] . " разів <br>";}
    else echo "Ласкаво просимо! <br/>";
	$data = date('d/m/Y H:i:s');
	if(isset($_COOKIE["data"])){
	$data = $_COOKIE["data"];
	echo 'Останнє відвідування: ' . $_COOKIE['data'] . " <br>";}
	$array = array();
	$array['qqq'] = "q123";
	$array['www'] = "w123";
	$array['eee'] = "e123";
	$array['rrr'] = "r123";?>
	<form name="qqq">
	<?php
	foreach($array as $k=>$val){
	setcookie( $k, $val, time()+3600, "/","", 0);
	echo "" . $k . ": <input type='text' name=" . $k . " value=" . $val . "><br>";}
	$counter++;
	$data = date('d/m/Y H:i:s');
	setcookie( "data", $data, time()+3600, "/","", 0);
	setcookie( "counter", $counter, time()+3600, "/","", 0);
		?>
	</form>
    </body>
    
</html>