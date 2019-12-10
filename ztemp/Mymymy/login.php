<?php
session_start();
include "db_connect.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query_login = "select * from Users where username like ? and password like ?";
//$result_login = mysqli_query($link, $query_login);
//$num_res = mysqli_num_rows($result_login);

$stmt = mysqli_stmt_init($link);
mysqli_stmt_prepare($stmt, $query_login);
mysqli_stmt_bind_param($stmt, "ss", $username, $password);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$num_res = mysqli_stmt_num_rows($stmt);

if ($num_res > 0) {
    $_SESSION['session_uname'] = $username;
    echo "<script> location.href='week8_2.php';</script>";
} else {
    echo "<html><a href='week8_1.php'>Try again maybe.</a><br/><span id=\"login_error\">Wrong username or password.</span></html>";
}
?>