<?php
session_start();
if(!isset($_SESSION['username'])){
  header("location:login.php");
}

include_once("navbar.php");

?>
<body>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<div id="txt">

  

<h1 align=center> Employees List</h1>
</div>



<link rel="stylesheet" type="text/css" href="style.css">
<table class="table" id="myTable">
  <thead>
<tr>
    <th>Employee ID</th>
    <th>Name</th>
    <th>E-mail Address</th>
    <th>Delete</th>
</tr>
</thead>
<form action="delete.php" method="POST">
<tbody>
<?php
include('db_config.php'); 
$sql="SELECT * FROM `employee_data`"; 

$result = $conn->query($sql);


  // output data of each row
  if ($result->num_rows > 0)
  while($row = $result->fetch_assoc()):?> 
    <tr>
        <td><?= $row['Employee_ID'];?></td>
        <td><?= $row['Name'];?></td>
        <td><?= $row['E-mail'];?></td>
        <td>
            <button type="submit"  name="delete_emp" value="<?= $row['Employee_ID'];?>">Delete</button>
        </td>
    
    </tr>
  <?php endwhile; ?>
</tbody>
</form>
</table>
</body>