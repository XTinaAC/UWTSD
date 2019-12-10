<html>
<head>
    <title></title>
</head>
<style>
    div{
        float: left;
        margin: 20px;
        padding:20px;
        background-color: lightblue;
        line-height: 30px;
    }
</style>
<script type="application/javascript">
    function hideFullInfo() {
        var fullinfo=document.getElementById("fullinfo");
        fullinfo.style.display="none";
        fullinfo.innerHTML="";
    }
    function getFullInfo(jobId) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState==4){
                var fullinfo=document.getElementById("fullinfo");
                fullinfo.style.display="block";
                fullinfo.innerHTML=xhr.responseText;
                console.log(xhr.responseURL);
            }
        };
        var url = "getFullInfo.php?id="+jobId;
        xhr.open('GET', url, true);
        xhr.send(null);
    }
</script>
<body>

<div>
    <?php
    include "db_connect.php";
    $query = "select * from People";
    $result = mysqli_query($link, $query);
    while ($tmp = mysqli_fetch_array($result)) {
        ?>
        <a onmouseover="javascript:getFullInfo(<?echo $tmp["jobId"]?>);"
                onmouseout="javascript:hideFullInfo();">
            <?php echo $tmp["firstName"] . "<br/>"; ?>
        </a>
        <?php
    }
    ?>
</div>

<div id="fullinfo" style="display: none;"></div>
</body>
</html>