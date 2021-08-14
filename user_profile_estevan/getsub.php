<?php
session_start();
$q = $_GET["q"];

$xml = simplexml_load_file("rss.xml");
//$simpleresult = '';
$selectedsub = $xml->xpath("//channel[@name='$q']");
//var_dump($selectedsub);
foreach ($selectedsub as $s){
    echo('<p>'.$s->title.'</p>'.'<br>');
    echo('<p>'.$s->link.'</p>'.'<br>');
    echo('<p>'.$s->description.'</p>'.'<br>');
}
/*$x = $xmlDoc->getElementsByTagName('title');
var_dump($q);
for ($i = 0; $i <= $x->length - 1; $i++) {
    //Process only element nodes
    if ($x->item($i)->nodeType == 1) {
        if ($x->item($i)->childNodes->item(0)->nodeValue == $q) {
            $y = ($x->item($i)->parentNode);
        }
    }
}

$cd = ($y->childNodes);

for ($i = 0; $i < $cd->length; $i++) {
    //Process only element nodes
    if ($cd->item($i)->nodeType == 1) {
        echo("<b>" . $cd->item($i)->nodeName . ":</b> ");
        echo($cd->item($i)->childNodes->item(0)->nodeValue);
        echo("<br>");
    }
}*/

