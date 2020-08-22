

<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="Welcome.php">Home</a>
    </div>
   
    <ul class="nav navbar-nav">
    
      <li class=""><a href="add_device.php">Add Device</a></li>
      <li ><a href="add_employee.php"> Add New Employe</a></li>
      <li class=""><a href="employee.php">Employees</a></li>
      <li ><a href="device.php">Devices</a></li>

      <li ><a href="issue.php">Issue New Device</a></li>
      <li ><a href="logout.php">Logout</a></li>

    </ul>
   
  </div>
  
</nav>

<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script>
    $(function(){
        $('a').each(function(){
            if ($(this).prop('href') == window.location.href) {
                $(this).addClass('active'); $(this).parents('li').addClass('active');
            }
        });
    });
</script>


</body>
</html>