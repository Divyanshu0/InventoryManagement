<?php
session_start();
if(!isset($_SESSION['username'])){
  header("login.php");
}
require "db_config.php";
include('navbar.php');
?>
 
<!DOCTYPE html>
<html>
 <head>
  <title>Device List</title>
 </head>
 <body>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<div id="txt">

<link rel="stylesheet" type="text/css" href="style.css">
  

<h1 align=center> Device List</h1>
</div>

 <div class="container mt-5">
 <!-- <a href="../home/home.php">Back To Home Page</a> -->
 
 
  <?php
  $stmt=$conn->prepare("Select * FROM device_data");
$stmt->bind_result($device_id, $device_name, $total_inventory,$available_inventory);
$stmt->execute();
$stmt->store_result();
if($stmt->num_rows > 0){
    echo '<table class="table" id="myTable">
            <thead>
            <tr>
                 <th>DeviceName</th>
                 <th>Total Inventory</th>
                 <th>Available Inventory</th>
                 <th colspan="2">Operations</th>
                 </tr>
                 </thead>
                </tbody>';
    while($stmt->fetch()){
        echo '<tr>
        <td>'.$device_name.'</td>
        <td>'.$total_inventory.'</td>
        <td>'.$available_inventory.'</td>
        <td><a href="edit.php? id='.$device_id.' & name='.$device_name.' & inventory='.$total_inventory.'">Edit</a></td>

        <td><a  href="delete.php?id='.$device_id.'" onClick="return confirmDelete();">Delete</a></td>
        </tr>';
    }
    echo '</tbody>
      </table>';
}
else{
    echo '0 results';
}
?> 
<script>
function confirmDelete(){
    return confirm('Are you sure you want to delete?');
}
</script>
 </div>
 </body>
 <?php
 $stmt->close();
 ?>
</html>