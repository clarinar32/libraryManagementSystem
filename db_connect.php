<?php
$host = "localhost"; 
$user = "root";      
$pass = "";          
$dbname = "student_library"; 

$conn = mysqli_connect($host, $user, $pass,$dbname);
if (!$conn) 
{
die("Connection failed: " . mysqli_connect_error()."</br>");
}
echo "Connection successfully created</br>";
?>