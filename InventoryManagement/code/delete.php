
<?php
include('db_config.php');
if(isset($_POST['delete_emp'])){
    $Emp=$_POST['delete_emp'];
    $dquery="DELETE FROM `employee_data`  WHERE Employee_ID =? ";
    $stm=$conn->prepare($dquery);
    $stm->bind_param('i',$Emp);
    if($stm->execute()){
      header("location:employee.php");
    }
    else{
        echo "Not possible";
    }
   
}
?>
<?php

require "db_config.php";
$stmt=$conn->prepare("delete from device_data where device_id=?");
$stmt->bind_param("i", $_GET['id']);
if($stmt->execute()){
    header("location:device.php");
  }
  else{
      echo "Not possible";
  }
 

?>