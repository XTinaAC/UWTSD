<?php
include "db_connect.php";

$content=$_GET["content"];
$query="select * from People as pp,Jobs as jb where pp.jobId=jb.jobId and ((pp.firstName like '$content') or (jb.jobTitle like '$content')
or (pp.firstName like '$content'))";
echo $query;
$result=mysqli_query($link,$query);
while ($value=mysqli_fetch_array($result)){
    print $value["firstName"]." ";
    echo $value["lastName"]." ";
    echo $value["jobTitle"]."<br/>";
}

?>