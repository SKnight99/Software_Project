<?php
include 'connect.php';
if(isset($_GET['deleteSalesID']))
{
	$SalesID=$_GET['deleteSalesID'];
	$sql="delete from sales where SalesID=$SalesID";
  $result=mysqli_query($con,$sql);
  if($result)
  {
      header('location:displaysales.php');
  }
  else
  {
	  die(mysqli_error($con));
  }
}
?>