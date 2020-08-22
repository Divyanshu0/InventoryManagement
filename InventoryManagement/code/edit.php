<?php
 include('db_config.php');
 include('navbar.php');
session_start();
if(!isset($_SESSION['username'])){
  header("login.php");
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>Device</title>
  
<link rel="stylesheet" type="text/css" href="style.css"> 
</head>
 <body>
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<div id="txt">

  

<h1 align=center> Update Inventory</h1>
</div>

  <div id="frm1">
   <form method="GET" action="">
   <div>
   <label id=heading1 for="id">Device  Id &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;</label>
   <input name="id" value="<?php echo $_GET['id'];?>" readonly/>
   </div>
    <div class=form-group>
       
   <label id=heading1 for="name">Device Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
   <input type="text" name="name" value="<?php echo $_GET['name'];?>" id="name" readonly/>
   </div>
   <div>
   <label id=heading1 for="inventory">Total Inventory  &nbsp;&nbsp;</label>
   <input type="number" id="inventory" name="inventory" value="<?php echo $_GET['inventory'];?>"/>
   </div>
   <input type="submit" name="submit" class="btn float-right login_btn value="Update"/>
   </form>
   <?php
   if(isset($_GET['submit'])){
      $query="select total_inventory,available_inventory from device_data where device_id=".$_GET['id'];
       $res=mysqli_query($conn,$query);
       $follow=$res->fetch_assoc();
       $follow['total_inventory']= $follow['total_inventory']- $follow['available_inventory'];

       $stmt=$conn->prepare("update device_data SET total_inventory=? where device_id=?");
       $stmt->bind_param("ii",$_GET['inventory'],$_GET['id']);
       $stmt->execute();
       $follow['total_inventory']=$_GET['inventory']- $follow['total_inventory'];
       $stmt2=$conn->prepare("update device_data SET available_inventory=? where device_id=?");
       $stmt2->bind_param("ii",$follow['total_inventory'],$_GET['id']);
       $stmt2->execute();
       ?>
                <META HTTP-EQUIV="Refresh" CONTENT="0; URL= http://localhost:8000/phpt/Assignment/code/device.php">
                <?php
}
?>
 </div>
 </body>
</html>
