<?php      
    
    session_start();
    if(!isset($_SESSION['username'])){
      header("location:login.php");
    }
    
    include('db_config.php');  
    $username = $_POST['user'];  
    $password = $_POST['pass'];  
      
        //to prevent from mysqli injection  
        unset($_SESSION['errorMsg']);
        $username = stripcslashes($username);  
        $password = stripcslashes($password);  
        $username = mysqli_real_escape_string($conn, $username);  
        $password = mysqli_real_escape_string($conn, $password);  
      $error="USser Name or password is wrong";
        $sql = "select *from admin_data where username = '$username' and password = '$password'";  
        $result = mysqli_query($conn, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
          
            $_SESSION['username']=$username;
            
            header("location:Welcome.php");
             
        }  
        else{  
         $_SESSION['errorMsg']=true;
         header("location:login.php");
         exit();
        }   
        
?>