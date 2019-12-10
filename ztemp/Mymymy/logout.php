<?php
session_start();
$_SESSION["session_uname"]==""; //Double-check
session_destroy();
echo "<script> location.href='week8_1.php';</script>";
?>