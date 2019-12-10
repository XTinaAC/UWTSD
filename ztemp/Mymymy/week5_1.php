<html>
<head>
    <title>
        Php Week5
    </title>
</head>

<body>

<?
//include "banner.php";
include "populate.php"
?>

<?php
//print_r($_GET);
$fn_txt = $_GET['fntxt'];
$sn_txt = $_GET['sntxt'];

if (isset($_GET['err1'])) {
    $fn_err = $_GET['err1'];
}
if (isset($_GET['err2'])) {
    $sn_err = $_GET['err2'];
}
?>

<form action="week5_2.php" method="POST">
    <input type="text" name="firstName" value="<?php echo "$fn_txt"; ?>" placeholder="First Name"><br/>
    <?php
    if ($fn_err == 1) {
        echo 'Please type in your first name<br>';
    }
    ?>
    <input type="text" name="lastName" value="<?php echo "$sn_txt"; ?>" placeholder="Surname"><br/>
    <?php
    if ($sn_err == 1) {
        echo 'Please type in your surname<br>';
    }
    ?>

    <select name="jobTitle">
        <? while ($value = mysqli_fetch_array($result)) {
            print "<option value=" . $value['jobId'] . ">" . $value['jobTitle'] . "</option>";
        }
        ?>
    </select>
    <input type="submit" value="Submit">
</form>

<?// include "footer.php" ?>

</body>

</html>

