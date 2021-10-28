<?php

if(isset($_POST['login']))
{
    $username = $_POST['name'];
    $password = $_POST['password'];

    $connection = mysqli_connect($server_name,$user_name,$dbpassword,$dbname);
    $query="SELECT * From msp WHERE username = $username";
    $query_run=mysqli_query($connection,$query);
    $usertypes = mysqli_fetch_array($query_run);

    if($password == $usertypes['password'])
    {
      $_SESSION['success'] = "Login";
      if ($usertypes['position'] == "Employer") {
        header('library/library.php');
      }else if ($usertypes['position'] == "Employee"){
        header('library/library.php');
      }
    }else{
      header('index.html');
    }
}

?>
