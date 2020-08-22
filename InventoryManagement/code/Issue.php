<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}

 include('db_config.php');
 include_once('navbar.php');
    $availDevice = mysqli_query($conn, "SELECT device_id,device_name,available_inventory FROM device_data WHERE available_inventory>0");
    $allEmp = mysqli_query($conn, "SELECT Employee_ID, `Name` FROM employee_data");
    $device_id = $employee_ID = $returnDate = "";
 
try {
 
    $assignDevice = $conn->prepare("INSERT INTO welcome (deviceId, empID, returndate) VALUES (?,?,?)");
    $assignDevice->bind_param("iis", $device_id, $employee_ID, $returnDate);
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["device_id"]) and isset($_POST["employee_ID"]) and isset($_POST["returnDate"])) {
       


        $device_id = $_POST["device_id"];
        $employee_ID = $_POST["employee_ID"];
        $returnDate = $_POST["returnDate"];
        
        $assignDevice->execute();
        $decreaseInventory = $conn->query("UPDATE device_data SET available_inventory = available_inventory-1 WHERE device_data.device_id=" . $_POST["device_id"]);
        echo "<h3 id=heading>New record created successfully</h3>";
       
    }
    }     
      catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
 
?>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<div id="txt">

<style>
    #heading {
        color:red
    
        };
</style>

<h1 align=center> Issue Device</h1>
</div>

<link rel="stylesheet" type="text/css" href="style.css">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group">
              <div class="dropdown">
                <label for="inputState" id=heading1>Device Name</label>
                <select id="inputState" class="form-control" name="device_id">
                  <?php
                  while ($row = mysqli_fetch_array($availDevice)) {
                      echo "<option value = " . $row['device_id'] . ">" . $row['device_name'] . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
 
            <div class="form-group">
              <div class="dropdown">
 
                <label for="inputState" id=heading1>Employee Name</label>
                <select id="inputState" class="form-control" name="employee_ID">
                  <?php
                  while ($row = mysqli_fetch_array($allEmp)) {
                      echo "<option value = " . $row['Employee_ID'] . ">" . $row['Name'] . "</option>";
                  }
                  ?>
                </select>
              </div>
            </div>
 
            <div class="form-group">
              <label for="example-date-input" id=heading1>Date</label>
              <input class="form-control" type="date" name="returnDate" id="example-date-input">
            </div>
 
            <button type="submit" class="btn btn-primary">Submit</button>
          
          </form>