<!DOCTYPE html>
<html>
<head> 
<title>Test</title>
<meta charset="utf-8">
</head>
<body>
<table>
<tbody>
<?php
$dom_xml= new DomDocument();
$dom_xml->loadXML('<car><model>BMW 525i</model><model>Ford Focus 2</model></car>');
$mod=$dom_xml->getElementsByTagName("model");
foreach ($mod as $element)
{
    echo "<tr><td>".$element->nodeValue." ".$element->nodeName." ".'</td></tr>';
}
?>
</tbody>
</table>
</body>
</html>