<?php 

require "Classes/Gravatar.php";

$g = new Gravatar("lablnet01@gmail.com");
echo $g->toHtml();


echo "<br>";

//Change the size
$g->setSize(512);
echo $g->toHtml();