<?php

$name=$group=$id="";


function print_output($Id,$mysql,$name,$group)
{
  $stm1="SELECT * FROM ongc.database WHERE ID='$Id' ; " ;
  $stm2="SELECT * FROM ongc.admin WHERE ID='$Id'; " ;
  $stm3="SELECT * FROM ongc.attachment WHERE ID='$Id'; " ;
  $res1 = $mysql->query($stm1);
  $res2 = $mysql->query($stm2);
  $res3 = $mysql->query($stm3); 
  if( $res1->num_rows<1 )
  { die ("<h1 style='text-align:center;'>ID does not exists</h1>"); }
  
  while($row=$res1->fetch_assoc())
  { 
   $issue=$row['Issue'];
   $issue_date=$row['Issue_date'];
   $issue_status=$row['Issue_stat'];
   $row=$res2->fetch_assoc();
   $solution=$row['Solution'];
   $sol_date=$row['Sol_Date'];
   $row=$res3->fetch_assoc();
   $file=$row['file_loc'];
   echo "<tr><td>".$Id."</td><td>".$name."</td><td>".$group."</td><td>".$issue."</td><td>".$issue_date."</td><td>".$solution."</td><td>".$issue_status."</td><td>".$sol_date."</td>";
   if($row)
   { echo "<td><a target='_blank' href='".$file."'>Y</a></td>"; }
   else
   { echo "<td>N</td>"; }
   echo "</tr>";
  }  
 
}


function test_input($data)
{
 $data=trim($data);
 $data=stripslashes($data);
 $data=htmlspecialchars($data);
 return $data;
}

$name=test_input($_POST["f_name"]);
$group=test_input($_POST["f_group"]);
$id=test_input($_POST["f_id"]);

if(empty($name)||empty($group)|| (!preg_match("/^[a-zA-Z ]*$/",$name)) || (!preg_match("/^[a-zA-Z ]*$/",$group)))
{ die ("<h1 style='text-align:center;' >Enter Valid Inputs</h1>"); }

$mysqli=new mysqli("localhost","user1","password","ongc");

if($mysqli->connect_errno)
{ echo "Failed to connect to the database (".$mysqli_connect_errno."):".$mysqli_connect_error ;  die(); }

if(empty($id))
{ 
 $stm="SELECT * FROM ongc.user WHERE Name='$name' AND mygroup='$group' ;";
 $res=$mysqli->query($stm);
 //$res->execute();
 if( $res->num_rows<1)
 { die ("<h1 style='text-align:center;'>Name/Group does not exists</h1>"); }
 echo "<style> body {background-color:white;} table,tr {border-spacing: 5px;width:100%;border:1px solid black;border-collapse:collapse;}th {text-align:left;} td,th{ border:1px solid black;border-collapse:collapse;} </style>";
  echo "<table><tr><th>ID.</th><th>Name</th><th>mygroup</th><th>Issue</th><th>Issue_date(Y-M-D H:M:S)</th><th>Solution</th><th>status</th><th>Sol_Date(Y-M-D H:M:S)</th><th>FILE</th></tr>";
 while($row=$res->fetch_assoc())
 {  
  print_output($row["ID"],$mysqli,$name,$group);
 }
 echo "</table>";
}
else
{ echo "<style> body {background-color:white;} table,tr {border-spacing: 5px;width:100%;border:1px solid black;border-collapse:collapse;}th {text-align:left;} td,th{ border:1px solid black;border-collapse:collapse;} </style>";
  echo "<table><tr><th>ID.</th><th>Name</th><th>mygroup</th><th>Issue</th><th>Issue_date</th><th>Solution</th><th>status</th><th>Sol_Date</th><th>FILE</th></tr>";
  $res=$mysqli->query("SELECT Name,mygroup FROM ongc.user WHERE ID='$id';");
  $row=$res->fetch_assoc();
  $name=$row["Name"];
  $group=$row["mygroup"];    
  print_output($id,$mysqli,$name,$group); 
  echo "</table>";
}


?>