<?php
//php gets the value from the form dropdown element
session_start();
$q = $_GET["q"];
//php loads the xml file and grabs the elements associated with the topic and presents it as html
$xml = simplexml_load_file("rss.xml");
//$simpleresult = '';
$selectedsub = $xml->xpath("//channel[@name='$q']");
//var_dump($selectedsub);
foreach ($selectedsub as $s){
    echo('<p>'.$s->title.'</p>'.'<br>');
    echo('<p>'.$s->link.'</p>'.'<br>');
    echo('<p>'.$s->description.'</p>'.'<br>');
}

