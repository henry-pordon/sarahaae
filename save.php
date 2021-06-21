<?php
session_start();
$txt=$_POST['Text'];
$_SESSION['text']=$txt;
header("location: login.php");


?>