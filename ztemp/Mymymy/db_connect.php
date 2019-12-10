<?php
$strServer="127.0.0.1";
$strDatabase="TinaDB";   // CHANGE TO YOUR DATABASE NAME HERE
$strUser="root";    
$strPwd="2012Uwtsd";    // Leave blank for WAMPServer

$link=mysqli_connect($strServer,$strUser,$strPwd,$strDatabase)or die("Could not open database");
?>