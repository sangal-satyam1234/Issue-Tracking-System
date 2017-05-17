<?php

//Upload File

echo "start<br><br>"; 

//$filetoupload=$_POST["filetoupload"];
$target_dir="C:/xampp/htdocs/ongc/attachments/";
$target_file=$target_dir.basename($_FILES["filetoupload"]["name"]);

echo $target_file."<br>";

$file_type=$_FILES["filetoupload"]["type"];
$file_size=$_FILES["filetoupload"]["size"];

echo $file_type." ".$file_size;

if($_FILES["filetoupload"]["size"] === 0)
{ die("error"); }

if(move_uploaded_file($_FILES["filetoupload"]["tmp_name"],$target_file))
{
 echo "<br>successful";
}
else
{ echo "unsuccessful";}



?>