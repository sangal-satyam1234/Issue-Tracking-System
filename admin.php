<?php

$admin=$password="";

function test_input($data)
{
 $data=trim($data);
 $data=stripslashes($data);
 $data=htmlspecialchars($data);
 return $data;
}

$admin=test_input($_POST["a_name"]);
$password=test_input($_POST["a_pass"]);

if(empty($admin) || empty($password) || ($admin!="admin") || ($password!="admin") )
{   die("<h1 style='text-align:center;' >ID/Password Incorrect</h1>") ; }



header("location:adminpage.php");



?>