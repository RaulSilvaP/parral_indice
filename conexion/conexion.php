<?php
 
$hostname_indices = "localhost";
//$database_indices = "rspeirl_indices_parral";  //SERVIDOR RSP.CL
//$username_indices = "rspeirl";
//$password_indices = "sg91829182";
$database_indices = "cbrparral";   //SERVIDOR UBUNTU CASA
$username_indices = "root";
$password_indices = "1234";
//$database_indices = "cbrparral";   //SERVIDOR PARRAL
//$username_indices = "root";
//$password_indices = "cbrparral2015";
//$database_indices = "cbrparral";   //SERVIDOR NOTEBOOK RAUL
//$username_indices = "root";
//$password_indices = "";


$conexion = mysqli_connect($hostname_indices, $username_indices, $password_indices, $database_indices) or die("Error ***** no se conecto al servidor... " . mysqli_error($conexion)); 

?>
