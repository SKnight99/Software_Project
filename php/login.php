<?php
    $username = $_POST['name'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost','root','','people_health_pharmacy');
    $query="SELECT * From employees WHERE username = $username";
    $query_run=mysqli_query($conn,$query);
    $usertypes = mysqli_fetch_array($query_run);

    if($password == $usertypes['pwd'])
    {
      if ($usertypes['position'] == "Employer") {
        header("Location: ../employee.php");
      }else if ($usertypes['position'] == "Employee"){
        header("Location: ../product/displayproduct.php");
      }
    }

    header("Location: ../employee.php");
?>
