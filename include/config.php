
<?php 
    $localhost="localhost";
    $name="root";
    $password="";
    $dbname="adminsite";

    $hostname ="news-site/admin/" ;
    $con =  mysqli_connect($localhost,$name,$password,$dbname) or die("Connection unsuccessful");
?>