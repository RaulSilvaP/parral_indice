<?php
 
$hostname_indices = "localhost";
//$database_indices = "";  //SERVIDOR RSP.CL
//$username_indices = "";
//$password_indices = "";
$database_indices = "";   //SERVIDOR UBUNTU CASA
$username_indices = "";
$password_indices = "";


$indices = mysqli_connect($hostname_indices, $username_indices, $password_indices, $database_indices) or die("Error ***** no se conecto al servidor... " . mysqli_error($indices)); 

?>