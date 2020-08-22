<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}

require 'db_config.php';
require 'navbar.php';
try {

    if($_SERVER["REQUEST_METHOD"] == "GET" and isset($_GET["id"])){
    $id = $_GET['id'];
    $devId = $_GET['devId'];
    $conn->query("UPDATE welcome SET devstatus = 'returned' WHERE welcome.id = $id");
    $conn->query("UPDATE device_data SET available_inventory = available_inventory+1 WHERE device_data.device_id=$devId");

    }
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<div id="txt">

  

<h1 align=center> Issued Devices</h1>
</div>

<br>
<link rel="stylesheet" type="text/css" href="style.css">

<form action="Welcome.php" method="post">
        <div class="form-group" style="float:right">
            <label id=heading1 for="sel1">Filter By:</label>
                <select class="selectpicker form-group" data-width="20%" name="filterBy" id="filter">
                    <option value="pending" >Pending</option>
                    <option value="returned" >Returned</option>
                </select>
            <input class="btn btn-primary" type="submit" name="filter" value="Filter By"><br>
        </div>
<table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Device Name</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Issued Date</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>

                <?php

                //Display Data into the Table
                // $result = mysqli_query($conn, "SELECT * FROM welcome");
                //require('navbar.php');
                $today = date("Y-m-d");
                if(isset($_POST['filter']) and $_POST['filterBy']=== 'returned' )
                {   
                   // require('navbar.php');
                    $sql = "SELECT * FROM welcome WHERE devstatus='returned'";
                    $filter_result = mysqli_query($conn,$sql);  
                }
                else{
                    
                    $sql = "SELECT * FROM welcome WHERE devstatus='pending'";
                    $filter_result = mysqli_query($conn,$sql);  
                }
                
                while ($row = mysqli_fetch_array($filter_result)) {
                  //  $deviceName = mysqli_fetch_array(mysqli_query($conn,"SELECT device_name FROM device_data WHERE device_id=".$row['device_id']));
                    $returnDate = date("d - m - Y", strtotime($row['returndate']));
                    // echo date("Y-m-d");
                    // echo $row['returnDate'];
                 

                    if($today>$row['returndate'] and $row['devstatus']=="pending"){
                        echo "<tr style='background-color:red'>";
                    }
                    else{
                     echo "<tr>";   
                    }
                    $sql3="Select Name from employee_data d inner join welcome w on d.Employee_ID=w.empID where w.empID=".$row['empID']."";
                    $mera=mysqli_query($conn,$sql3);
                    $followingdata = $mera->fetch_assoc();
                    $sql4="Select device_name from device_data d inner join welcome w on d.device_id=w.deviceId where w.deviceId=".$row['deviceId']."";
                    $mera1=mysqli_query($conn,$sql4);
                    $followingdata1 = $mera1->fetch_assoc();
                   
                              echo "<td>". $followingdata1['device_name']. "</td>
                                    <td>" . $followingdata['Name'] . "</td>
                                    <td>" . date("d - m - Y", strtotime($row['issuedate'])) . "</td>
                                    <td>" . date("d - m - Y", strtotime($row['returndate'])) . "</td>
                                    <td>" . $row['devstatus'] . "</td>";
                                    if($row['devstatus']=="pending"){
                                    echo "<td><a href='Welcome.php?id=".$row['id']."&devId=".$row['deviceId']."'>Mark as returned</a></td>";
                                   }
                                echo "</tr>";
                }
                ?>
            </tbody>
        </table>
</form>
<script type="text/javascript">
    document.getElementById('filter').value = "<?php echo $_POST['filterBy'];?>";
</script>
