<?php
session_start();
$_SESSION=array();
//$_SESSION['loggedIn']=False;
session_destroy();
header("Location:login.php");?>
