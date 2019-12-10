<?
include "db_connect.php";
$queryStatement = "select * from People";
$result = mysqli_query($link, $queryStatement);
$num_res = mysqli_num_rows($result);
$space = " ";
?>

<?

$form_id = $_POST['form_id'];
$confirmed_delete = 0;
$confirmed_delete = $_POST['$confirm_del'];

while ($value = mysqli_fetch_array($result)) {
    echo $value["id"] . $space;
    echo $value["firstName"] . $space;
    echo $value["lastName"] . $space;
    ?>
    <form action="week7_2.php" method="POST" style="display: inline">
        <input type="hidden" value="<?echo $value["id"] ?>" name="form_id">
        <input type="submit" value="Update" name="form_op">
        <input type="submit" value="Delete" name="form_op"><br/>
    </form>
    <?
}
?>

