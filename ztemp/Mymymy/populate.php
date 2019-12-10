<!--Php Code To Populate Html <select>
    With Values From The MySQL Database-->

<?include "db_connect.php";
$queryStatement = "select jobId,jobTitle from Jobs";
$result = mysqli_query($link, $queryStatement);
$num_res = mysqli_num_rows($result);
$space = " ";
?>