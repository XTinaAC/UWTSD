<!--Normalization: Limit a table to one purpose
    & reduce the number of duplicate data
    contained within the database.-->

<?
include "db_connect.php";

$const_lastName = "lastName";
$const_firstName = "firstName";
$jobId = $_POST['jobTitle'];

$query_norm = "select * from People,Jobs where People.jobId=Jobs.jobId
and (".$const_lastName." like "."'".$sn."'". " or ".$const_firstName." like "."'".$fn."')
and People.jobId=".$jobId;
//echo $query_norm;
$result_norm = mysqli_query($link, $query_norm);
$num_res_norm = mysqli_num_rows($result_norm);

if ($num_res_norm<1){
    //$query_insert="insert into People(firstName,lastName,jobId) values('$fn','$sn','$jobId')";
    //$result_insert = mysqli_query($link, $query_insert);

    // Use Prepared Statements to prevent SQL Injection
    $prep_stmt_insert = mysqli_stmt_init($link);
    $prep_query_insert="insert into People(firstName,lastName,jobId) values(?,?,?)";
    mysqli_stmt_prepare($prep_stmt_insert,$prep_query_insert);
    mysqli_stmt_bind_param($prep_stmt_insert,"ssi",$fn,$sn,$jobId);
    mysqli_stmt_execute($prep_stmt_insert);
    mysqli_close($link);
}else{
    $space = " ";
    while($value=mysqli_fetch_array($result_norm)){
        echo "<br/>";
        echo $value["id"].$space;
        echo $value["firstName"].$space;
        echo $value["lastName"].$space;
        echo $value["jobTitle"].$space;
        echo "<br/>";
    }
}
?>