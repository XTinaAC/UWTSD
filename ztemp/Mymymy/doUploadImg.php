<?php
$imgDir="images/";
$timestamp=time();
$filename=$_FILES['image']['name'];
$tmpname=$_FILES['image']['tmp_name'];

//Preferably add [PRIMARY KEY] and [TIMESTAMP] info to
// prevent images with the same name from being overwritten;
$PATH=$imgDir.$timestamp."_".basename($filename);
if (move_uploaded_file($tmpname,$PATH)){
    echo "Successfully Uploaded file to".$PATH;
}else{
    echo "Please go back and try again laster.";
}
?>