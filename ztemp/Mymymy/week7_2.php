<?php
include "db_connect.php";
$form_id = $_POST['form_id'];
$form_op = $_POST['form_op'];

$confirmed_op = 0;
$confirmed_op = $_POST['$confirm_op'];

if ($confirmed_op == 1) {
    if ($form_op == "Update") {
        $updated_firstName = $_POST['upd_fn'];
        $updated_lastName = $_POST['upd_ln'];
        $updated_jobTitle = $_POST['upd_jt'];
        // Single quoto around characters;
        $query_update = "update People set firstName='$updated_firstName',lastName='$updated_lastName',jobId=$updated_jobTitle where id=$form_id limit 1";
        echo $query_update;
        $result_update = mysqli_query($link, $query_update);
    } else if ($form_op == "Delete") {
        $query_delete = "delete from People where id=$form_id limit 1";
        echo $query_delete;
        $result_delete = mysqli_query($link, $query_delete);
    }
//    header("location:db_show.php");
} else {
    $query_find = "select * from People where id=$form_id limit 1";
//    echo $query_find;
    $result_find = mysqli_query($link, $query_find);
    $value_find = mysqli_fetch_array($result_find);

    if ($form_op == "Update") {
        $query_job = "select * from Jobs";
        $result_job = mysqli_query($link, $query_job);
        ?>
        <form action="week7_2.php" method="POST">
            <input type="hidden" value="<? echo $form_id ?>" name="form_id">
            <input type="hidden" value="1" name="$confirm_op">
            <input type="hidden" value="Update" name="form_op">
            First Name:<input type="text" placeholder="<? echo $value_find['firstName'] ?>" name="upd_fn"><br>
            Last Name:<input type="text" placeholder="<? echo $value_find['lastName'] ?>" name="upd_ln"><br>
            Job Title:<select name="upd_jt">
                <? while ($value_job = mysqli_fetch_array($result_job)) {
                    print "<option value=" . $value_job['jobId'];
                    if ($value_job['jobId'] == $value_find['jobId']) {
                        print " selected";
                    }
                    print ">" . $value_job['jobTitle'] . "</option>";
                }
                ?>
            </select><br/>
            <input type="submit" value="Save">
            <a href="db_show.php"><input type="button" value="Cancel"></a>
        </form>
        <?
    } else if ($form_op == "Delete") {
        echo "Are You Sure To Delete This Record: <br/>" .
            $value_find['firstName'] . " " .
            $value_find['lastName'] . " " .
            $value_find['jobId'] .
            "?";
        ?>
        <form action="week7_2.php" method="POST">
            <input type="hidden" value="<?
            echo $form_id ?>" name="form_id">
            <input type="hidden" value="1" name="$confirm_op">
            <input type="hidden" value="Delete" name="form_op">
            <input type="submit" value="Yes,I cannot see why not?!">
            <a href="db_show.php"><input type="button" value="No,I've changed my mind."></a>
        </form>
        <?
    }
}
?>