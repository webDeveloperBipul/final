<?php 

include('sql_config.php');



$query="DELETE FROM `all_member_form_data`";
mysqli_query($conn, $query);


$query="DELETE FROM `member_premier_data`";
mysqli_query($conn, $query);


$query="DELETE FROM `comity`";
mysqli_query($conn, $query);


$query="DELETE FROM `comity_data`";
mysqli_query($conn, $query);




header('location: ../front-page.php' );
  
?>



