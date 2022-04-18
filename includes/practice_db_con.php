<?php 
$server_name="localhost" ;
 $db_username="root" ; 
 $db_password="" ;
 $$db_name="practice_db" ;

 $con = mysqli_connect($server_name,  $db_username, $db_password,  $$db_name);
 

 if (!$con)
 {
     die("connection failed:".mysqli_connect_error());
 }