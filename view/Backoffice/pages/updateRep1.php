<?php 
include "../../../controller/reponsesC.php";
$content = isset($_POST["content"]) ?$_POST["content"]:'erreur';
$dater2=isset($_POST["dater2"]) ?$_POST["dater2"]:'errur';
$idr=isset($_POST["idr3"]) ?$_POST["idr3"]:'erreur';
$reponceC=new reponsesC();
$reponceC->update($idr,$content,$dater2);

echo var_dump($_POST);