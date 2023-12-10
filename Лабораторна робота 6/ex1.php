<html> 
    <head>
        <title>qqq</title>
    </head>
    
    <body>
        <?php 
	$counter = 0;
		if(isset($_COOKIE["counter"]))
    $counter = $_COOKIE["counter"];
	$counter = $counter + 1;
    setcookie( "counter", $counter, time()+3600, "/","", 0);
		if(isset($_COOKIE["counter"]))
	echo $_COOKIE["counter"];
		?>
    </body>
    
</html>