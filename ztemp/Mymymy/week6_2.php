<?
include "db_connect.php";
$queryStatement = "select * from People where ".$_POST['nameType']." like "."'".$_POST['search']."'"
." AND ".$_POST['nameType']." like "."'".$_POST['search']."'"
//    ." OR lastName like "."'".$_POST['search']."'";
    ." OR 1=1 --";

echo $queryStatement;
$result = mysqli_query($link, $queryStatement);
$num_res = mysqli_num_rows($result);
$space = " ";
while($value=mysqli_fetch_array($result)){
    echo "<br>";
    echo $value["id"].$space;
    echo $value["firstName"].$space;
    echo $value["lastName"].$space;
    echo $value["jobTitle"].$space;
    echo "<br>";
}
?>