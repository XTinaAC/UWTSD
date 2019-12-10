<html>
<head>
    <style>
        .hint{
            text-align: center;
            color: deepskyblue;
        }
        .header{
            background-color: pink;
        }
    </style>
</head>
<h1>
    <?php
    //Server-side time
    $current_date=date("D(l) d/M/Y");
    echo $current_date."<br/>";
    echo date("F dS , Y H:m:s");

    //Unix Timestamp <=> Number of seconds since 1970
    $current_time=time();
    $christmast_time=1577278800;
    echo "<br/><br/>".date("F dS , Y",$christmast_time);

    //Ceil(); Floor(); Round();
    $seconds_to_christmas=$christmast_time-$current_time;
    $days_to_christmas=ceil($seconds_to_christmas/(60*60*24));
    echo "<br/>".$days_to_christmas." days to Christmas!";
    ?>
</h1>

<?php
include "db_connect.php";
$username = $_POST['username'];
$password = $_POST['password'];

$query_date = "select * from Events where datetime > $current_time and datetime <= $christmast_time";
$result_date = mysqli_query($link, $query_date);
$num_res = mysqli_num_rows($result_date);
echo "<table><tr><th colspan='2' class='hint'>Events Before Christmas</th></tr>";
echo "<tr class='header'><th>Date</th><th>Event</th></tr>";
while($value_date=mysqli_fetch_array($result_date)){
    echo "<tr>";
    echo "<td>".$value_date['timestamp']."</td>";
    echo "<td>".$value_date['eventName']."</td>";
    echo "</tr>";
}
echo "</table>";

$query_date = "select * from Events where datetime > $christmast_time";
$result_date = mysqli_query($link, $query_date);
$num_res = mysqli_num_rows($result_date);
echo "<table><tr><th colspan='2' class='hint'>Events After Christmas</th></tr>";
echo "<tr class='header'><th>Date</th><th>Event</th></tr>";
while($value_date=mysqli_fetch_array($result_date)){
    echo "<tr>";
    echo "<td>".$value_date['timestamp']."</td>";
    echo "<td>".$value_date['eventName']."</td>";
    echo "</tr>";
}
echo "</table>";
?>
</html>
