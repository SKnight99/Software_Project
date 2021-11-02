

<?php

$connection = mysqli_connect("localhost", "root", "");


$db = mysqli_select_db("people_health_pharmacy", $connection);

$query = mysqli_query("select * from employees", $connection);


mysqli_close($connection);
?>

<html>

<span>id:</span> <?php echo $row1['id']; ?>
<span>First Name:</span> <?php echo $row1['firstName']; ?>
<span>Last Name:</span> <?php echo $row1['lastName']; ?>
<span>Gender:</span> <?php echo $row1['gender']; ?>

</html>