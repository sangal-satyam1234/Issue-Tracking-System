<?php

session_start();

$group=$datefrom=$dateto=$text=$type="";

function print_output($Id,$mysql)
{
  $stm1="SELECT * FROM ongc.database WHERE ID='$Id' ; " ;
  $stm2="SELECT * FROM ongc.admin WHERE ID='$Id'; " ;
  $stm3="SELECT * FROM ongc.user WHERE ID='$Id' ; " ;
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
   $name=$row['Name'];
   $group=$row['mygroup'];

   if(isset($_SESSION['login']))
   { $issue_status='<a href="http://localhost/admin_solpage.php?id='.$Id.'">'.$issue_status.'</a>'; }

   echo "<tr><td>".$Id."</td><td>".$name."</td><td>".$group."</td><td>".$issue."</td><td>".$issue_date."</td><td>".$solution."</td><td>".$issue_status."</td><td>".$sol_date."</td></tr>";
  }  
 
}


function test_input($data)
{
 $data=trim($data);
 $data=stripslashes($data);
 $data=htmlspecialchars($data);
 return $data;
}

$group=test_input($_POST["group"]);
$datefrom=test_input($_POST["datefrom"]);
$dateto=test_input($_POST["dateto"]);
$text=test_input($_POST["text"]);
$type=test_input($_POST["status"]);

$mysqli=new mysqli("localhost","user1","password","ongc");

if($mysqli->connect_errno)
{ echo "Failed to connect to the database (".$mysqli_connect_errno."):".$mysqli_connect_error ;  die(); }

$stm="";

if($type === "Show Only Solved")
{  $stm="SELECT distinct(a.ID) FROM ongc.database as a,ongc.user as b WHERE a.Issue_stat='Solved' " ; if($group!= "no"){$stm=$stm."AND a.ID=b.ID AND b.mygroup='$group'"; }
   $stm=$stm.";"; }
if($type === "Show Only Unsolved" )
{ $stm="SELECT distinct(a.ID) FROM ongc.database as a,ongc.user as b WHERE a.Issue_stat='Unsolved' " ; if($group!= "no"){$stm=$stm."AND a.ID=b.ID AND b.mygroup='$group'" ;}
   $stm=$stm.";"; }
if ($type === "Show All")
{ $stm="SELECT distinct(a.ID) FROM ongc.database as a,ongc.user as b " ;if($group!= "no"){$stm=$stm."WHERE a.ID=b.ID AND b.mygroup='$group'"; }
   $stm=$stm.";";  }


if ($type === "Submit")
{ 
  if(empty($datefrom) && empty($dateto))
  { $stm="SELECT ID FROM ongc.database ;" ; }
  else if (empty($datefrom))
  { $stm="SELECT ID FROM ongc.database WHERE Issue_Date<='$dateto' ;" ; }
  else if(empty ($dateto))
  { $stm="SELECT ID FROM ongc.database WHERE Issue_Date>='$datefrom';" ; }
  else
  { $stm="SELECT ID FROM ongc.database WHERE Issue_date>='$datefrom' AND Issue_date<='$dateto' ; " ; }
}

if($type === "Issue")
{ if(empty($text))
  { $stm="SELECT ID FROM ongc.database ;" ; }
  
 $stm = "(SELECT ID from ongc.admin where Solution LIKE '%$text%') union (SELECT ID from ongc.database where Issue like '%$text%') ; " ;

}  

$res=$mysqli->query($stm);

echo "<style> body {background-color:white;} table,tr {border-spacing: 5px;width:100%;border:1px solid black;border-collapse:collapse;}th {text-align:left;} td,th{ border:1px solid black;border-collapse:collapse;} </style>";
echo "<table><tr><th>ID.</th><th>Name</th><th>mygroup</th><th>Issue</th><th>Issue_date</th><th>Solution</th><th>status</th><th>Sol_Date</th></tr>";


while($row=$res->fetch_assoc())
{
 print_output($row["ID"],$mysqli);
}

echo "</table>";

?>