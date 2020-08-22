<?php
  $servername="localhost:3307";
  $username="root";
  $password="";
  $database="inventoryassignment";

  $conn=new mysqli($servername,$username,$password,$database);
     if(!$conn){
         echo "Wrong";
     }
     
  ?>

