<?php

if(isset($_POST['login']))
{
    $username = $_POST['name'];
    $password = $_POST['password'];

    $conn = new mysqli('localhost','root','','people_health_pharmacy');
    $query="SELECT * From msp WHERE username = $username";
    $query_run=mysqli_query($conn,$query);
    $usertypes = mysqli_fetch_array($query_run);

    if($password == $usertypes['pwd'])
    {
      $_SESSION['success'] = "Login";
      if ($usertypes['position'] == "Employer") {
        header('emplyee.php');
      }else if ($usertypes['position'] == "Employee"){
        header('product/displayproduct.php');
      }
    }else{
      header('index.html');
    }
}

?>
