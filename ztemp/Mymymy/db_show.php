<style>
    .myspan{
        width: 200px;
        height: 60px;
        border: 1px solid;
    }
</style>
<?php include "db_connect.php";
    $query="select * from People";
//    $query="select * from People where firstName like 'N%' or lastName like '%y' order by firstName asc , lastName desc";
    $result=mysqli_query($link,$query);
    $num_res=mysqli_num_rows($result);
    if ($num_res==0){
        echo $num_res." Results Found! <br>";
    }else{
        $span_prefix="<span class='myspan'>";
        $span_suffix="</span>";
        $space=" ";

        while($value=mysqli_fetch_array($result)){
            echo "<br>";
            echo $span_prefix.$value["id"].$space.$span_suffix;
            echo $span_prefix.$value["firstName"].$space.$span_suffix;
            echo $span_prefix.$value["lastName"].$space.$span_suffix;
//            echo $span_prefix.$value["jobTitle"].$space.$span_suffix;
            echo "<br>";
        }
    }
?>