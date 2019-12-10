<html>
<head>
    <title>Php Week6</title>
</head>
<body>

<?
include "banner.php";
?>

<form action="week6_2.php" method="POST">
    <input type="text" name="search" placeholder="Name Search"><br/>
    <input type="radio" name="nameType" value="firstName" checked>First Name<br/>
    <input type="radio" name="nameType" value="lastName">Last Name<br/>
    <input type="submit" value="Submit">
</form>

<? include "footer.php" ?>

</body>
</html>

