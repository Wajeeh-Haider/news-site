<?php 

session_start();

session_unset();

session_destroy();
// include "../include/config.php";
header("Location:index.php");
?>