<?php
include "../../controller/reponsesC.php";


$employeC=new reponsesC();
$employeC->deletereponses($_GET["idrep"]);

header('Location:listeindex.php');