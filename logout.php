<?php
 session_start();
 if (isset($_SESSION['auth'])) {
 	session_destroy();
 	header('Location:login.php');
 }else{
 	header('Location:login.php');
 }

?>