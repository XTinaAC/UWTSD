<?php

$fn=$_POST["firstName"];
$sn=$_POST["lastName"];

if($fn==""){
    $fn_err=1;
}
if($sn==""){
    $sn_err=1;
}
if($fn_err==1||$sn_err==1){
    header("location:week5_1.php?err1=$fn_err&err2=$sn_err&fntxt=$fn&sntxt=$sn");
}else{
    echo "<br/> Welcome! $fn $sn <br/>";
    include "normalization.php";
}

?>