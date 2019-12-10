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
    function getFullInfo()
    {
        var fullInfoBox=document.getElementById("fullInfoBox");
        var content=document.getElementById("mySearch").value;
        fullInfoBox.innerHTML="Search "+content;

        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState==4){
                fullInfoBox.innerHTML=xhr.responseText;
                // console.log(xhr.responseURL);
            }
        };
        var url = "returnSearch.php?content="+content;
        xhr.open('GET', url, true);
        xhr.send(null);
    }
</script>
<body>
<form action="javascript:getFullInfo();">
Search:
    <input type="text" id="mySearch"><br>
    <input type="submit" value="Go!">
</form>
<span id="fullInfoBox"></span>
</body>
</html>