<?php



$id=$_GET['id'];

$mysqli=new mysqli("localhost","admin","admin","ongc");

if($mysqli->connect_errno)
{ echo "Connection error (".$mysqli->connect_errno."):".$mysqli->connect_err; die(); }

  $stm1="SELECT * FROM ongc.database WHERE ID='$id' ; " ;
  $stm2="SELECT * FROM ongc.admin WHERE ID='$id'; " ;
  $stm3="SELECT * FROM ongc.user WHERE ID='$id'; ";
  $stm4="SELECT * FROM ongc.attachment WHERE ID='$id' ; ";
  $res1 = $mysqli->query($stm1);
  $res2 = $mysqli->query($stm2); 
  $res3 = $mysqli->query($stm3);
  $res4 = $mysqli->query($stm4);
  if( $res1->num_rows<1 )
  { die ("<h1 style='text-align:center;'>ID does not exists</h1>"); }
  
  $row=$res3->fetch_assoc();
  
  $name=$row["Name"];
  $group=$row["mygroup"];
 
  $row=$res1->fetch_assoc();
  $issue=$row["Issue"];

  $row=$res2->fetch_assoc();
 
  $solution=$row["Solution"];

  $file_loc=""; 

  $row=$res4->fetch_assoc();
 
  if($res4->num_rows<1)
  {  $file_loc="NO" ; } 
  else  
  { $file_loc='<a target=_blank href="'.$row["file_loc"].'">YES</a>' ; }   


?>



<html>

<head>
<style>

#ff {   width:600px; padding:5px 5px;height:auto;  margin:0 auto; border:2px solid black; background-color:white; }
body {margin:50px;10px;padding:10px; text-align:center; }
#issue { display:inline-block; width:auto ; height:auto; padding:5px 5px; margin:0 auto; border:1px solid black; text-align:left;}

</style>
</head>




<body>


<div id="ff">

<div style="float:left">NAME :<?php echo $name; ?></div>
<div style="float:right">GROUP : <?php echo $group; ?></div><br><br>
<div id="issue"><?php echo $issue; ?></div>
<br><br>
<div style="float:left">ATTACHMENT :<?php echo $file_loc; ?></div>
<br><br>

<div>
<form name="solution" method="post" action="admin_sol.php">
<textarea autofocus required name="a_sol" style="width:100%;height:150px;" ><?php echo $solution; ?></textarea> 
<br><br>
<input type=radio name="status" value="Solved">Solved</input><input type=radio name="status" value="Unsolved" checked>Unsolved</input>
<br>
<input type=submit value="Submit"></input>
<input type=reset value="Reset"></input>
<input type=hidden name="id" value="<?php echo $id; ?>"></input>
<input type=hidden name="solu" value="<?php echo $solution; ?>"> </input>
</form>
</div>




</div>
</body>


</html>