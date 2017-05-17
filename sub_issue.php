<?php

//SUBMISSION PAGE

function test_input($data)
{
 $data=trim($data);
 $data=stripslashes($data);
 $data=htmlspecialchars($data);
 return $data;
}


$ID=$Name=$Group=$Issue=$datetime="";

$Name=test_input($_POST["f_name"]);
$Group=test_input($_POST["f_group"]);
$Issue=test_input($_POST["issue"]);

if( empty($Name) || empty($Group) || empty($Issue) || (!preg_match("/^[a-zA-Z ]*$/",$Name)) || (!preg_match("/^[a-zA-Z ]*$/",$Group)) )
{   die("<h1 style='text-align:center;' >Enter Valid Inputs</h1>") ; }


$mysqli = new mysqli("localhost" , "user1","password","ongc" );

if($mysqli->connect_errno)
{ echo "Failed to connect to the database (".$mysqli_connect_errno."):".$mysqli_connect_error ;  die(); }


$stm1 = "INSERT INTO ongc.user(Name,mygroup) VALUES ('$Name','$Group');" ;

$res1=$mysqli->query($stm1);
if($mysqli->affected_rows < 1)
{ echo "ERROR ,please try again"; die();}

$ID=mysqli_insert_id($mysqli);
$datetime = date_create()->format('Y-m-d H:i:s'); 

$stm2 = "INSERT INTO ongc.database(ID,Issue,Issue_date) VALUES ('$ID','$Issue','$datetime') ; " ;
$res2=$mysqli->query($stm2);

if($_FILES["filetoupload"]["size"] != 0)
{
 $target_dir="C:/xampp/htdocs/";
 $tar="ongc/attachments/";
 $target_file=$tar.basename($_FILES["filetoupload"]["name"]);
 $file_type=$_FILES["filetoupload"]["type"];
 $file_size=$_FILES["filetoupload"]["size"];
 
if(move_uploaded_file($_FILES["filetoupload"]["tmp_name"],$target_dir.$target_file))
{ 
  $target_file="http://localhost/".$target_file;
  $stm="INSERT INTO ongc.attachment(ID,file_loc,file_size,file_type) VALUES ('$ID','$target_file','$file_size','$file_type') ; " ; 

  $res=$mysqli->query($stm);
}

}


echo "<h1 style='text-align:center;margin-top:40px'>Your Issue has been recorded.ISSUE ID is : ".$ID." for future references. </h1>"  ;



?>