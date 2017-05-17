<?php

function test_input($data)
{
 $data=trim($data);
 $data=stripslashes($data);
 $data=htmlspecialchars($data);
 return $data;
}


   $sol=$_POST["a_sol"];
   $stat=$_POST["status"];
   $pre_sol=$_POST["solu"];
 
   $sol=test_input($sol);

   $id=$_POST["id"];
    
   if(empty($sol))
   { header("Location:admin_solpage.php?id=$id"); }

   $mysqli = new mysqli("localhost" , "user1","password","ongc" );

   if($mysqli->connect_errno)
   { echo "Failed to connect to the database (".$mysqli_connect_errno."):".$mysqli_connect_error ;  die(); }  
   
   $datetime = date_create()->format('Y-m-d H:i:s');
 
   $stm="INSERT INTO ongc.admin(ID,Solution,Sol_date) VALUES ('$id','$sol','$datetime'); ";   
  
   if(!empty($pre_sol))
   { $mysqli->query("DELETE FROM ongc.admin WHERE ID='$id'"); $mysqli->query("UPDATE ongc.database SET Issue_stat='Unsolved' WHERE ID='$id'"); }

   $res=$mysqli->query($stm); 

   echo "<h1 style='text-align:center;margin-top:40px'>RECORD :".$id." UPDATED</h1>"  ;         
 
   if($stat === "Solved")
   {
   $stm="UPDATE ongc.database SET Issue_stat='Solved' WHERE ID='$id' ";
   $res=$mysqli->query($stm);  
   }
   else
   { 
    $stm="UPDATE ongc.database SET Issue_stat='Unsolved' WHERE ID='$id' ";
    $res=$mysqli->query($stm);  
   }
?>