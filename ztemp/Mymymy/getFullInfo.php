<?php
include "db_connect.php";

$id=$_GET["id"];
$query="select * from People as pp,Jobs as jb where pp.jobId=jb.jobId and id=$id";
$result=mysqli_query($link,$query);
$value=mysqli_fetch_array($result);

print $value["firstName"]." ";
echo $value["lastName"]." ";
echo $value["jobTitle"];

?>