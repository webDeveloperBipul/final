<?php  
$connect = mysqli_connect("localhost", "root", "", "torun");
$sql = "INSERT INTO comity_data(first_name, last_name, c_name) VALUES('".$_POST["first_name"]."', '".$_POST["last_name"]."', '".$_POST["c_name"]."')";  
if(mysqli_query($connect, $sql))  
{  
     echo 'Data Inserted';  
}  
 ?>