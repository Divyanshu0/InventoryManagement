<?php
 session_start();
 if(!isset($_SESSION['username'])){
   header("location:login.php");
 }
 

include('db_config.php');
include_once("navbar.php");
if(isset($_POST['submit'])){
  if (empty($_POST['devicename']) || empty($_POST['total'])) {
     echo "<h4 id=heading>Empty or Invalid Input</h4>";
}
else{
    $d_name=$_POST['devicename'];
    $total= $_POST['total'];
   $_POST['availabe_inventory']=$_POST['total'];
   $avail= $_POST['availabe_inventory'];
    $sql ="INSERT INTO `device_data` VALUES( '','$d_name','$total','$avail')";
    if ($conn->query($sql) === TRUE) {
        echo "<h5 id=heading3 >New record created successfully </h5>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
}
}
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<div id="txt">

  
<style>
    #heading {
        color:red
    
        };
    
</style>
<style>
    #heading3 {
        color:yellow
    
        };
    
</style>


<h1 align=center> Add New Device</h1>
</div>

<link rel="stylesheet" type="text/css" href="style.css">
<div id="frm1">
<form action="" method="POST">
<div id="indent">
  <div>
            <p>
                
                <label id=heading1> Device name &nbsp;&nbsp;&nbsp;   </label>
               <input type="text" id="devicename" name="devicename" />
            </p>

            <p>
                <label id=heading1>Total Inventory </label>
                <input type="number" id="total" name="total" />
            </p>
            <p>
            </p>
            <div class="form-group">
						<input type="submit" id="btn" name="submit" value="submit" " class="btn float-right login_btn">
					</div>
              
            </p>
      </div>
</div>


</form>
</div>S