<?php

session_start();


if(isset($_SESSION['login']))
{
 header('Location:adminpage.php');
}


?>


<!DOCTYPE HTML>
<html>

<head>
<style>

iframe { frameborder=0; border:none; padding:0; }

body {
    margin: 0px !important;
    padding: 0px !important;
    border: 0px !important;
    font-size: 0px;
    background-color:grey;
}

</style>
</head>

<body>

<iframe src="/ongc/head.html" name="frame1" width="100%" height="80px" ></iframe>
<iframe src="/ongc/disp.html" name="frame2" width="100%" height="90px"  ></iframe>
<iframe src="" name="frame3" width="100%" height="500px"> </iframe>

</body>
</html>


