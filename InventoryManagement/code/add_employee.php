<?php
 session_start();
 if(!isset($_SESSION['username'])){
   header("location:login.php");
 }
 ?>

<?php
include('db_config.php');
include_once('navbar.php');


if(isset($_POST['submit'])){
    $id=$_POST['eid'];

    $name= $_POST['ename'];
   
    $email=$_POST['email'];
    $error="USser Name or password is wrong";
   if($email!=null  && $name!=null && $id!=null){

   
    $sql ="INSERT INTO `employee_data` VALUES('$id', '$name','$email')";
    if ($conn->query($sql) === TRUE) {
        echo "<h5 id=heading3> New record created successfully !!</h5>";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
}
else{
    echo "<h5  id=heading>INVALID OR Empty INPUT</h5>";
    
}
}


?>

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


<body>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<div id="txt">

  

<h1 align=center> Add New Employee</h1>
</div>

<link rel="stylesheet" type="text/css" href="style.css">
<div id="frm1">
<form action="" method="POST">
    <div id="indent">
           <p>
                <label id=heading1> Employee Id </label>
                <input type="text" id="eid" name="eid" />
            </p>
            <p>
                <label id=heading1>Name  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                <input type="text" id="ename" name="ename" />
            </p>
            <p>
                <label id=heading1 >E-mail id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </label>
                <input type="email" id="email" name="email" />
            </p>
        
                <input type="submit" id="btn1"  name="submit" value="submit" />
    </div>
</form>
</div>

</body>

